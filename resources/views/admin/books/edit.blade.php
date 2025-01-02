<x-app-layout>
    <x-admin-sidebar />
    <div class="p-4 sm:ml-64 mt-16">
        <!-- Header -->
        <div class="bg-blue-500 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4 text-center text-white">Edit Buku</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Judul Buku')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $book->title) }}" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Author -->
                <div class="mb-4">
                    <x-input-label for="author" :value="__('Penulis')" />
                    <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" value="{{ old('author', $book->author) }}" required />
                    <x-input-error :messages="$errors->get('author')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <x-input-label for="category" :value="__('Kategori')" />
                    <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" value="{{ old('category', $book->category) }}" required />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                <!-- PDF Upload -->
                <div class="mb-4">
                    <x-input-label for="pdf" :value="__('Upload PDF')" />
                    <input id="pdf" type="file" name="pdf" accept="application/pdf" required
                        class="block mt-1 w-full text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
                    @if ($book->pdf)
                        <a href="{{ asset($book->pdf) }}" target="_blank" class="text-blue-500 underline mt-2 block">
                            Lihat PDF yang Diunggah
                        </a>
                    @endif
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <x-input-label for="image" :value="__('Gambar Buku')" />
                    <input id="image" type="file" name="image" accept="image/*"
                        class="block mt-1 w-full text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    @if ($book->image)
                        <img src="{{ asset($book->image) }}" alt="Book Image" class="mt-4 w-32 h-32 object-cover rounded">
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4 space-x-3">
                    <x-secondary-button type="button" onclick="history.back()">
                        {{ __('Batal') }}
                    </x-secondary-button>
                    <x-primary-button type="submit">
                        {{ __('Simpan Perubahan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
