<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::query();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('booking_id', 'like', $searchTerm)
                ->orWhere('payment_method', 'like', $searchTerm)
                ->orWhere('amount', 'like', $searchTerm)
                ->orWhere('va_code', 'like', $searchTerm)
                ->orWhere('status', 'like', $searchTerm);
        }

        // Sort logic
        if ($request->has('sort')) {
            $direction = $request->has('direction') ? $request->direction : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }

        $payment = $query->paginate(10);
        return view('payment.index', compact('payment'));
    }

    // Create
    public function create()
    {
        $bookings = Booking::all();
        $paymentMethods = PaymentMethod::all();
        return view('payment.create', compact('bookings', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'amount' => 'required|numeric',
        ]);

        // Tambahkan status secara manual ke dalam data yang akan disimpan
        $data['status'] = 'pending';

        // Get name
        $name = Auth::user()->name;

        // get code metode pembayaran berdasarkan ID
        $paymentMethod = PaymentMethod::findOrFail($data['payment_method_id'])->code;

        // Generate kode booking
        $bookingCode = "booking" . $data['booking_id'];

        // Panggil fungsi generateVA
        $vaCode = $this->generateVA($bookingCode, $data['amount'], $name, $paymentMethod);

        Payment::create(array_merge($data, ['va_code' => $vaCode]));

        return redirect()->route('payment.index')->with('success', 'Payment added successfully!');
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'amount' => 'required|numeric',
        ]);

        $payment->update($data);

        return redirect()->route('payment.index')->with('success', 'Payment updated successfully!');
    }

    // Show
    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }

    //Delete
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully!');
    }

    public function generateVA(string $orderCode, int $amount, string $username, string $paymentMethod)
    {
        $expirationDate = now()->addDays(1)->format('Y-m-d\TH:i:s\Z');
        // Hit API Xendit untuk membuat Virtual Account
        // Mengenkripsi kunci API Xendit dalam format Basic Authentication
        $base64ApiKey = base64_encode(env('XENDIT_API_KEY'));
        // dd($amount);
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $base64ApiKey . "Og==",
            'Content-Type' => 'application/json',
        ])->post('https://api.xendit.co/callback_virtual_accounts', [
            'external_id' => $orderCode,
            'bank_code' => $paymentMethod,
            'name' => $username,
            // 'expected_amount' => $amount,
            'expiration_date' => $expirationDate
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            return $responseData['account_number'];
        } else {
            return $response;
        }
    }
}
