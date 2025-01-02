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

                        @foreach ($borrowedBooks as $transaction)
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    @if ($transaction->book->image)
                                        <img class="rounded-t-lg" src="{{ asset($transaction->book->image) }}" alt="{{ $transaction->book->title }}" />
                                    @endif
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $transaction->book->title }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Penulis: {{ $transaction->book->author }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kategori: {{ $transaction->book->category }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tanggal Pinjam: {{ $transaction->borrow_date->format('d M Y') }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tanggal Kembali: {{ $transaction->return_date->format('d M Y') }}</p>
                                    <button onclick="openPdfModal('{{ asset($transaction->book->pdf) }}')"
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Baca Buku
                                         <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </button>
                                    <form action="{{ route('books.return', $transaction->id) }}" method="POST" class="mt-3">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            Kembalikan Buku
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pdf-preview-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Pratinjau PDF</h3>
                <button onclick="closePdfModal()" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="pdf-container" class="overflow-auto"></div>
            <div class="items-center px-4 py-3 flex justify-between">
                <button onclick="fullscreenPdfModal()" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Fullscreen
                </button>
                <button onclick="closePdfModal()" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
    <script>
        function openPdfModal(pdfUrl) {
            const modal = document.getElementById('pdf-preview-modal');
            modal.style.display = 'block';

            const container = document.getElementById('pdf-container');

            container.innerHTML = '';

            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

            pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
                for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {
                    pdf.getPage(pageNumber).then(function (page) {
                        const viewport = page.getViewport({ scale: 1.5 });

                        const canvas = document.createElement('canvas');
                        canvas.classList.add('mb-4');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: canvas.getContext('2d'),
                            viewport: viewport,
                        };

                        page.render(renderContext);

                        container.appendChild(canvas);
                    });
                }
            });
        }

        function closePdfModal() {
            const modal = document.getElementById('pdf-preview-modal');
            modal.style.display = 'none';
        }

        function fullscreenPdfModal() {
            const modal = document.getElementById('pdf-preview-modal');
            if (modal.requestFullscreen) {
                modal.requestFullscreen();
            } else if (modal.webkitRequestFullscreen) {
                modal.webkitRequestFullscreen();
            } else if (modal.msRequestFullscreen) {
                modal.msRequestFullscreen();
            }
        }
    </script>
</x-app-layout>
