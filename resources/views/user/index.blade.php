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
                    
                    <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('user.index') }}" class="flex w-full md:w-auto">
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
                                    <a href="{{ route('user.index', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Name
                                      @if(request('sort') === 'name')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                      <a href="{{ route('user.index', ['sort' => 'email', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          Email
                                          @if(request('sort') === 'email')
                                             @if(request('direction') === 'asc')
                                                  <span class="material-symbols-outlined">arrow_drop_up</span>
                                              @else
                                                  <span class="material-symbols-outlined">arrow_drop_down</span>
                                              @endif
                                          @endif
                                      </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('user.index', ['sort' => 'password', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                    Password
                                      @if(request('sort') === 'password')
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
                                @foreach($user as $c)
                                    <tr>
                                      <td class="border px-4 py-2">{{ $c->name }}</td>
                                      <td class="border px-4 py-2">{{ $c->email }}</td>
                                      <td class="border px-4 py-2">{{ $c->password }}</td>
                                        <td class="border px-4 py-2 flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('user.show', $c->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    visibility
                                                </span>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('user.edit', $c->id) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    edit
                                                </span>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('user.destroy', $c->id) }}" method="POST" class="inline">
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
                        {{ $user->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
