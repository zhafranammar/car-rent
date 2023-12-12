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
                    <h2 class="text-2xl mb-4">Add Booking</h2>

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <!-- Car ID Input -->
                        <div class="mb-4">
                            <label for="car_id" class="block">Car:</label>
                            <select name="car_id" id="car_id" class="border p-2 w-full" required>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->police_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Customer ID Input -->
                        <div class="mb-4">
                            <label for="customer_id" class="block">Customer:</label>
                            <select name="customer_id" id="customer_id" class="border p-2 w-full" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Start Date Input -->
                        <div class="mb-4">
                            <label for="start_date" class="block">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" class="border p-2 w-full" required>
                        </div>

                        <!-- End Date Input -->
                        <div class="mb-4">
                            <label for="end_date" class="block">End Date:</label>
                            <input type="date" name="end_date" id="end_date" class="border p-2 w-full" required>
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
