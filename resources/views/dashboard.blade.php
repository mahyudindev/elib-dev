<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 20px">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Selamat datang, {{ auth()->user()->name }}
                    <br>
                    <p>Anda telah berhasil login ke sistem Elibrary.</p>
                </div>

            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 20px">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Buku Yang Anda Pinjam</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
