<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cars Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Title -->
                    <h2 class="text-2xl mb-4">Car Data Edited #{{$car->id}}</h2>

                    <form action="{{ route('car.update', $car->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Police Number Input -->
                        <div class="mb-4">
                            <label for="police_number" class="block">Police Number:</label>
                            <input type="text" name="police_number" id="police_number" value="{{ $car->police_number }}" class="border p-2 w-full" required>
                        </div>
                        
                        <!-- Year Input -->
                        <div class="mb-4">
                            <label for="year" class="block">Year:</label>
                            <input type="text" name="year" id="year" value="{{ $car->year }}" class="border p-2 w-full" required>
                        </div>

                        <!-- Color Input -->
                        <div class="mb-4">
                            <label for="color" class="block">Color:</label>
                            <input type="text" name="color" id="color" value="{{ $car->color }}" class="border p-2 w-full" required>
                        </div>
                        
                        <!-- Price Input -->
                        <div class="mb-4">
                            <label for="price" class="block">Price:</label>
                            <input type="number" name="price" id="price" value="{{ $car->price }}" class="border p-2 w-full" required>
                        </div>

                        <!-- Status Input -->
                        <div class="mb-4">
                            <label for="status" class="block">Status:</label>
                             <select name="status" id="status" class="border p-2 w-full" required>
                                <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Availaible</option>
                                <option value="rent" {{ $car->status == 'rent' ? 'selected' : '' }}>Rent</option>
                                <option value="service" {{ $car->status == 'rent' ? 'selected' : '' }}>Service</option>
                            </select>
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
