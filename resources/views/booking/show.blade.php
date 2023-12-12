<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bookings Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <!-- Title -->
                  <h2 class="text-2xl mb-4">Booking #{{$booking->id}}</h2>

                  <!-- Car ID Input -->
                    <div class="mb-4">
                        <label for="car_id" class="block">Car ID:</label>
                        <input type="text" name="car_id" id="car_id" value="{{ $booking->car_id }}" class="border p-2 w-full bg-gray-100" disabled>
                    </div>

                    <!-- Customer ID Input -->
                    <div class="mb-4">
                        <label for="customer_id" class="block">Customer ID:</label>
                        <input type="text" name="customer_id" id="customer_id" value="{{ $booking->customer_id }}" class="border p-2 w-full bg-gray-100" disabled>
                    </div>

                    <!-- Start Date Input -->
                    <div class="mb-4">
                        <label for="start_date" class="block">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" value="{{ $booking->start_date }}" class="border p-2 w-full bg-gray-100" disabled>
                    </div>

                    <!-- End Date Input -->
                    <div class="mb-4">
                        <label for="end_date" class="block">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="{{ $booking->end_date }}" class="border p-2 w-full bg-gray-100" disabled>
                    </div>

                    <!-- Amount Input -->
                    <div class="mb-4">
                        <label for="amount" class="block">Amount:</label>
                        <input type="number" name="amount" id="amount" value="{{ $booking->amount }}" class="border p-2 w-full bg-gray-100" disabled>
                    </div>


                  <a href="{{ route('booking.edit', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      Edit
                  </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
