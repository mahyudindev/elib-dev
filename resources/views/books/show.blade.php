<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center space-x-6">
                        <!-- Gambar Buku -->
                        @if ($book->image)
                            <img src="{{ asset('images/books/' . $book->image) }}" alt="{{ $book->title }}"
                                class="w-100 h-120 object-cover rounded-lg">
                        @endif

                        <!-- Informasi Buku -->
                        <div>
                            <h5 class="text-xl font-bold">{{ $book->title }}</h5>
                            <p class="mt-2"><strong>Pengarang:</strong> {{ $book->author }}</p>
                            <p class="mt-2"><strong>Kategori:</strong> {{ $book->category }}</p>
                        </div>
                    </div>
                    <div class="mt-6" style="text-align: center;">
                        <a href="{{ route('books.index') }}" type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Kembali ke Katalog
                            </span>
                        </a>
                        {{-- <a href="{{ route('books.show', $book->id) }}" type="button" --}}
                        <a href="#" type="button"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Pinjam
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
