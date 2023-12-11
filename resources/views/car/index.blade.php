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
                    
                    <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">
                        <!-- Tambah Data Button -->
                        <a href="{{ route('car.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            <span class="material-symbols-outlined mr-4">
                                add
                            </span> Add Car
                        </a>

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('car.index') }}" class="flex w-full md:w-auto">
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
                                    <a href="{{ route('car.index', ['sort' => 'police_number', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Police Number
                                      @if(request('sort') === 'police_number')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('car.index', ['sort' => 'year', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Year
                                      @if(request('sort') === 'year')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                      <a href="{{ route('car.index', ['sort' => 'color', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          Color
                                          @if(request('sort') === 'color')
                                             @if(request('direction') === 'asc')
                                                  <span class="material-symbols-outlined">arrow_drop_up</span>
                                              @else
                                                  <span class="material-symbols-outlined">arrow_drop_down</span>
                                              @endif
                                          @endif
                                      </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('car.index', ['sort' => 'price', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Price
                                      @if(request('sort') === 'price')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                      <a href="{{ route('car.index', ['sort' => 'status', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          Status
                                          @if(request('sort') === 'status')
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
                                @foreach($car as $c)
                                    <tr>
                                      <td class="border px-4 py-2">{{ $c->police_number }}</td>
                                      <td class="border px-4 py-2">{{ $c->year }}</td>
                                      <td class="border px-4 py-2">{{ $c->color }}</td>
                                        <td class="border px-4 py-2">Rp. {{ $c->price }}</td>
                                        <td class="border px-4 py-2">{{ $c->status }}</td>
                                        <td class="border px-4 py-2 flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('car.show', $c->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    visibility
                                                </span>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('car.edit', $c->id) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    edit
                                                </span>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('car.destroy', $c->id) }}" method="POST" class="inline">
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
                        {{ $car->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
