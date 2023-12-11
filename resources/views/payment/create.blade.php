<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Title -->
                    <h2 class="text-2xl mb-4">Add Payment</h2>

                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf

                         <!-- Booking ID Input -->
                        <div class="mb-4">
                            <label for="booking_id" class="block">Booking:</label>
                            <select name="booking_id" id="booking_id" class="border p-2 w-full" required>
                                @foreach($bookings as $booking)
                                    <option value="{{ $booking->id }}">{{ $booking->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Payment Method ID Input -->
                        <div class="mb-4">
                            <label for="payment_method_id" class="block">Payment Method:</label>
                            <select name="payment_method_id" id="payment_method_id" class="border p-2 w-full" required>
                                @foreach($paymentMethods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Amount Input -->
                        <div class="mb-4">
                            <label for="amount" class="block">Amount:</label>
                            <input type="number" name="amount" id="amount" class="border p-2 w-full" required>
                        </div>

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
