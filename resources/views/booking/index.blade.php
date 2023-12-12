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
                    
                    <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">
                        <!-- Tambah Data Button -->
                        <a href="{{ route('booking.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            <span class="material-symbols-outlined mr-4">
                                add
                            </span> Add Booking
                        </a>

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('booking.index') }}" class="flex w-full md:w-auto">
                            <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" class="p-2 border rounded-l w-full md:w-auto md:ml-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r flex items-center">
                                <span class="material-symbols-outlined mr-2">
                                    search
                                </span> Search
                            </button>
                        </form>
                    </div>



                    <div class="overflow-x-auto">
                        <!-- Table -->
                        <table class="min-w-full border">
                            <thead>
                                <tr>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('booking.index', ['sort' => 'car_id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Car Id
                                      @if(request('sort') === 'car_id')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                      <a href="{{ route('booking.index', ['sort' => 'customer_id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          Customer Id
                                          @if(request('sort') === 'customer_id')
                                             @if(request('direction') === 'asc')
                                                  <span class="material-symbols-outlined">arrow_drop_up</span>
                                              @else
                                                  <span class="material-symbols-outlined">arrow_drop_down</span>
                                              @endif
                                          @endif
                                      </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('booking.index', ['sort' => 'start_date', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Start Date
                                      @if(request('sort') === 'start_date')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                      <a href="{{ route('booking.index', ['sort' => 'end_date', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          End Date
                                          @if(request('sort') === 'end_date')
                                             @if(request('direction') === 'asc')
                                                  <span class="material-symbols-outlined">arrow_drop_up</span>
                                              @else
                                                  <span class="material-symbols-outlined">arrow_drop_down</span>
                                              @endif
                                          @endif
                                      </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                      <a href="{{ route('booking.index', ['sort' => 'amount', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          Amount
                                          @if(request('sort') === 'amount')
                                             @if(request('direction') === 'asc')
                                                  <span class="material-symbols-outlined">arrow_drop_up</span>
                                              @else
                                                  <span class="material-symbols-outlined">arrow_drop_down</span>
                                              @endif
                                          @endif
                                      </a>
                                  </th>
                                    <th class="border px-4 py-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking as $c)
                                    <tr>
                                      <td class="border px-4 py-2">{{ $c->car_id }}</td>
                                      <td class="border px-4 py-2">{{ $c->customer_id }}</td>
                                      <td class="border px-4 py-2">{{ $c->start_date }}</td>
                                        <td class="border px-4 py-2">{{ $c->end_date }}</td>
                                        <td class="border px-4 py-2">Rp. {{ $c->amount }}</td>
                                        <td class="border px-4 py-2 flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('booking.show', $c->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    visibility
                                                </span>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('booking.edit', $c->id) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    edit
                                                </span>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('booking.destroy', $c->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 flex items-center justify-center" onclick="return confirm('Are you sure?')">
                                                    <span class="material-symbols-outlined text-center">
                                                        delete
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $booking->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
