<x-app-layout>
    <x-slot name="header">
        @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                            title: "{{ session('success') }}",
                            icon: "success",
                            timer: 2500,
                            timerProgressBar: true,
                            });
            });
        </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                        title: "{{ session('error') }}",
                        icon: "error",
                        timer: 2500,
                        timerProgressBar: true,
                        });
        });
    </script>
@endif

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Katalog Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        @foreach ($books as $book)
                            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                                <div class="flex">
                                    <div class="flex-1 p-4">
                                        <h5 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                            {{ $book->title }}
                                        </h5>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $book->author }}</p>
                                        <p class="text-gray-600 dark:text-gray-400">Kategori: {{ $book->category }}</p>
                                        <br>
                                        <a href="{{ route('books.show', $book->id) }}" type="button"
                                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                            <span
                                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Detail
                                            </span>
                                        </a>

                                        <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                Pinjam Buku
                                            </button>
                                        </form>

                                    </div>
                                    <div class="flex-none">
                                        @if ($book->image)
                                            <img src="{{ asset($book->image) }}"
                                                alt="{{ $book->title }}"
                                                class="max-w-32 max-h-64 object-cover rounded-lg">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
