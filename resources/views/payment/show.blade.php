<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payments Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <!-- Title -->
                  <h2 class="text-2xl mb-4">Cars #{{$payment->id}}</h2>

                  <!-- Booking Id Input -->
                  <div class="mb-4">
                      <label for="booking_id" class="block">Booking Id:</label>
                      <input type="text" name="booking_id" id="booking_id" value="{{ $payment->booking_id }}" class="border p-2 w-full bg-gray-100" disabled>
                  </div>

                  <!-- Payment Method Input -->
                  <div class="mb-4">
                      <label for="payment_method_id" class="block">Payment Method :</label>
                      <input type="text" name="payment_method_id" id="payment_method_id" value="{{ $payment->paymentMethod->name }}" class="border p-2 w-full bg-gray-100" disabled>
                  </div>

                   <!-- Amount Input -->
                  <div class="mb-4">
                      <label for="color" class="block">Amount:</label>
                      <input type="text" name="color" id="color" value="{{ $payment->amount }}" class="border p-2 w-full bg-gray-100" disabled>
                  </div>
                  
                  
                  <!-- Status Input -->
                  <div class="mb-4">
                      <label for="status" class="block">Status:</label>
                      <input type="text" name="status" id="status" value="{{ $payment->status }}" class="border p-2 w-full bg-gray-100" disabled>
                    </div>
                    
                <!-- VA Code Input -->
                <div class="mb-4">
                    <label for="price" class="block">Virtual Account:</label>
                    <input type="number" name="price" id="price" value="{{ $payment->va_code}}" class="border p-2 w-full bg-gray-100" disabled>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
