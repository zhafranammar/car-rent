<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <!-- Title -->
                  <h2 class="text-2xl mb-4">Users #{{$user->id}}</h2>

                  <!-- Name Input -->
                  <div class="mb-4">
                      <label for="year" class="block">Name:</label>
                      <input type="text" name="name" id="name" value="{{ $user->name }}" class="border p-2 w-full bg-gray-100" disabled>
                  </div>

                   <!-- Email Input -->
                  <div class="mb-4">
                      <label for="email" class="block">Color:</label>
                      <input type="text" name="email" id="email" value="{{ $user->email }}" class="border p-2 w-full bg-gray-100" disabled>
                  </div>
                  
                  <!-- Password Input -->
                  <div class="mb-4">
                      <label for="password" class="block">Password:</label>
                      <input type="password" name="password" id="password" value="{{ $user->password }}" class="border p-2 w-full bg-gray-100" disabled>
                  </div>


                  <a href="{{ route('user.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      Edit
                  </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
