<x-app-layout>
    <x-admin-sidebar />
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

    <div class="p-4 sm:ml-64 mt-16">
        <!-- Header -->
        <div style="height: 70px" class="bg-blue-500 shadow-md rounded px-8 pt-4 pb-4 mb-2">
            <h1 class="text-xl font-semibold mb-2 text-center text-white">ALL Books</h1>
        </div>

        <div class="p-6 text-gray-900 dark:text-gray-100">
            @if ($books->isEmpty())
                <p class="text-center text-gray-500">Tidak ada buku yang tersedia.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($books as $book)
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden h-full flex flex-col">
                            @if ($book->image)
                                <div class="flex-none">
                                    <img class="w-full h-48 object-cover transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="{{ asset($book->image) }}" alt="{{ $book->title }}">
                                </div>
                            @endif
                            <div class="flex flex-1 flex-col p-4">
                                <h5 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                    {{ $book->title }}
                                </h5>
                                <p class="text-gray-600 dark:text-gray-400">{{ $book->author }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Kategori: {{ $book->category }}</p>

                                @if ($book->pdf)
                                <!-- Button untuk membuka modal PDF -->
                                <button onclick="openPdfModal('{{ asset($book->pdf) }}', {{ $book->id }})"
                                        class="mt-2 text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Lihat PDF
                                </button>

                                <!-- Modal untuk pratinjau PDF -->
                                <div id="pdf-preview-modal-{{ $book->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                                    <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
                                        <div class="mt-3 text-center">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">Pratinjau PDF</h3>
                                            <div class="mt-2" id="pdf-container-{{ $book->id }}" class="overflow-auto"></div>
                                        </div>
                                        <div class="items-center px-4 py-3">
                                            <button id="close-pdf-modal-{{ $book->id }}" onclick="closePdfModal({{ $book->id }})" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <br>
                                <div class="mt-auto">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.books.edit', $book->id) }}" class="flex-grow text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                                data-book-id="{{ $book->id }}"
                                                class="flex-grow text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="delete-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Hapus</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        Apakah Anda yakin ingin menghapus buku ini?
                    </p>
                </div>
            </div>
            <div class="items-center px-4 py-3">
                <form id="delete-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Ya, Hapus
                    </button>
                </form>
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 text-gray-700 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
    <script>
        function openPdfModal(pdfUrl, bookId) {
            const modal = document.getElementById('pdf-preview-modal-' + bookId);
            modal.style.display = 'block';

            const containerId = 'pdf-container-' + bookId;
            const container = document.getElementById(containerId);

            // Kosongkan container sebelum merender PDF
            container.innerHTML = '';

            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

            pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
                // Iterasi untuk merender setiap halaman
                for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {
                    pdf.getPage(pageNumber).then(function (page) {
                        const viewport = page.getViewport({ scale: 1.5 });

                        // Buat elemen <canvas> untuk setiap halaman
                        const canvas = document.createElement('canvas');
                        canvas.classList.add('mb-4');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: canvas.getContext('2d'),
                            viewport: viewport,
                        };

                        page.render(renderContext);

                        // Tambahkan <canvas> ke container
                        container.appendChild(canvas);
                    });
                }
            });
        }

        function closePdfModal(bookId) {
            const modal = document.getElementById('pdf-preview-modal-' + bookId);
            modal.style.display = 'none';
        }

        document.querySelectorAll('[data-modal-toggle="delete-modal"]').forEach(button => {
            button.addEventListener('click', () => {
                const bookId = button.getAttribute('data-book-id');
                const form = document.getElementById('delete-form');
                form.action = `/admin/books/${bookId}`;
                document.getElementById('delete-modal').style.display = 'block';
            });
        });

        function closeDeleteModal() {
            document.getElementById('delete-modal').style.display = 'none';
        }
    </script>

</x-app-layout>
