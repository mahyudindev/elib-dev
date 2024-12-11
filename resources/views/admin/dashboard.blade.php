<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <x-admin-sidebar />

    <div class="p-4 sm:ml-64">
        <div class="bg-blue-500 p-4 rounded-lg">
            <h1 class="text-white">Selamat datang, {{ auth()->user()->name }}</h1>
        </div>

        <div class="grid grid-cols-2 gap-6 mt-6">
            <div style="height: 160px" class="bg-gradient-to-br from-purple-600 to-blue-500 p-6 rounded-xl shadow-lg">
                <h2 class="text-white text-3xl font-bold text-center">Jumlah Books</h2>
                <h2 class="text-white text-5xl font-semibold">{{ $bookCount }}</h2>
            </div>

            <div style="height: 160px" class="bg-gradient-to-br from-green-400 to-blue-600 p-6 rounded-xl shadow-lg">
                <h2 class="text-white text-3xl font-bold text-center">Jumlah Users</h2>
                <h2 class="text-white text-5xl font-semibold">{{ $userCount }}</h2>
                <div class="text-center mt-4">
                    <a href="{{ route('admin.user.index') }}" class="text-white underline">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
