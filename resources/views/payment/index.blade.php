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
                    
                    <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">
                        <!-- Tambah Data Button -->
                        <a href="{{ route('payment.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            <span class="material-symbols-outlined mr-4">
                                add
                            </span> Add Payment
                        </a>

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('payment.index') }}" class="flex w-full md:w-auto">
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
                                    <a href="{{ route('payment.index', ['sort' => 'booking_id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Booking Id
                                      @if(request('sort') === 'booking_id')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('payment.index', ['sort' => 'payment_method_id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                      Payment Method Id
                                      @if(request('sort') === 'payment_method_id')
                                      @if(request('direction') === 'asc')
                                      <span class="material-symbols-outlined">arrow_drop_up</span>
                                      @else
                                      <span class="material-symbols-outlined">arrow_drop_down</span>
                                      @endif
                                      @endif
                                    </a>
                                  </th>
                                  <th class="border px-4 py-2">
                                    <a href="{{ route('payment.index', ['sort' => 'amount', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
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
                                      <a href="{{ route('payment.index', ['sort' => 'status', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
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
                                      <a href="{{ route('payment.index', ['sort' => 'va_code', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                          VA Billing Code
                                          @if(request('sort') === 'va_code')
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
                                @foreach($payment as $c)
                                    <tr>
                                      <td class="border px-4 py-2">{{ $c->booking_id }}</td>
                                      <td class="border px-4 py-2">{{ $c->paymentMethod->name }}</td>
                                      <td class="border px-4 py-2">Rp. {{ $c->amount }}</td>
                                      <td class="border px-4 py-2">{{ $c->status }}</td>
                                      <td class="border px-4 py-2">{{ $c->va_code }}</td>
                                        <td class="border px-4 py-2 flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('payment.show', $c->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    visibility
                                                </span>
                                            </a>
                                            <!-- Delete Button -->
                                            <form action="{{ route('payment.destroy', $c->id) }}" method="POST" class="inline">
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
                        {{ $payment->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
