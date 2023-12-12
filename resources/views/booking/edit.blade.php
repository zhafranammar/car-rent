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
                    <h2 class="text-2xl mb-4">Booking Data Edited #{{$booking->id}}</h2>

                    <form action="{{ route('car.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Car ID Input (Dropdown) -->
                        <div class="mb-4">
                            <label for="car_id" class="block">Car ID:</label>
                            <select name="car_id" id="car_id" class="border p-2 w-full" required>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}" {{ $booking->car_id == $car->id ? 'selected' : '' }}>{{ $car->police_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Customer ID Input (Dropdown) -->
                        <div class="mb-4">
                            <label for="customer_id" class="block">Customer ID:</label>
                            <select name="customer_id" id="customer_id" class="border p-2 w-full" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Start Date Input -->
                        <div class="mb-4">
                            <label for="start_date" class="block">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $booking->start_date }}" class="border p-2 w-full  " required>
                        </div>

                        <!-- End Date Input -->
                        <div class="mb-4">
                            <label for="end_date" class="block">End Date:</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $booking->end_date }}" class="border p-2 w-full  " required>
                        </div>

                        <!-- Amount Input -->
                        <div class="mb-4">
                            <label for="amount" class="block">Amount:</label>
                            <input type="number" name="amount" id="amount" value="{{ $booking->amount }}" class="border p-2 w-full  " required>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
