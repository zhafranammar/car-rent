<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('car_id', 'like', $searchTerm)
                ->orWhere('customer_id', 'like', $searchTerm)
                ->orWhere('amount', 'like', $searchTerm);
        }

        // Sort logic
        if ($request->has('sort')) {
            $direction = $request->has('direction') ? $request->direction : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest(); // Default sorting
        }

        $booking = $query->paginate(10);
        return view('booking.index', compact('booking'));
    }

    // Create
    public function create()
    {
        $cars = Car::all();
        $customers = User::all();

        return view('booking.create', compact('cars', 'customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'amount' => 'required|numeric|min:0',
        ]);

        Booking::create($data);

        return redirect()->route('booking.index')->with('success', 'Booking added successfully!');
    }

    // Edit
    public function edit(Booking $booking)
    {
        $cars = Car::all();
        $customers = User::all();
        return view('booking.edit', compact('booking', 'cars', 'customers'));
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'amount' => 'required|numeric|min:0',
        ]);

        $booking->update($data);

        return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
    }

    // Show
    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    //Delete
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
    }
}
