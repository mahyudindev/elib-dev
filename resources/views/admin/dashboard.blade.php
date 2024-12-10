<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <x-admin-sidebar />

    <div class="p-4 sm:ml-64">
        <h1>  Selamat datang, {{ auth()->user()->name }}</h1>
    </div>
</x-app-layout>
