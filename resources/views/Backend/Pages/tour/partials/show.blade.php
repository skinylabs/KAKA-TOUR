@extends('Backend.app')

@section('content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">{{ $tour->name }}</h1>

            <div class="text-sm sm:text-base">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/tours" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Tours</p>
                    </li>
                </ol>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('tours.transportations.create', $tour->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                Transportasi</a>

            <button onclick="openModal()"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                Import dari Excel
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="importModal" class="fixed inset-0 flex items-center justify-center z-50 hidden" onclick="closeModal(event)">
        <div class="bg-white rounded-lg shadow-lg p-6" onclick="event.stopPropagation()">
            <h2 class="text-lg font-semibold mb-4">Pilih file untuk diimport</h2>
            <form id="importForm" action="{{ route('tours.transportations.import', $tour->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" required class="mb-4">
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()"
                        class="mr-2 text-gray-600 hover:text-gray-800">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Upload File Ini</button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mt-6">Transportasi</h2>
    <table>
        <thead>
            <tr>
                <th>Tipe Kendaraan</th>
                <th>Nama Peserta</th>
                <th>Kelompok</th>
                <th>Nomor Kamar</th>
            </tr>
        </thead>
        <tbody>
            @if ($transportations->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @else
                @foreach ($transportations as $transportation)
                    <tr>
                        <td>{{ $transportation->vehicle }}</td>
                        <td>{{ $transportation->name }}</td>
                        <td>{{ $transportation->group }}</td>
                        <td>{{ $transportation->room_number }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>



    <script>
        function openModal() {
            const modal = document.getElementById('importModal');
            modal.classList.remove('hidden'); // Show the modal
            modal.classList.add('flex'); // Apply flex display
        }

        function closeModal(event) {
            if (event) {
                // Only close if the click is outside the modal content
                if (event.target.id === 'importModal') {
                    const modal = document.getElementById('importModal');
                    modal.classList.add('hidden'); // Hide the modal
                    modal.classList.remove('flex'); // Remove flex display
                }
            } else {
                const modal = document.getElementById('importModal');
                modal.classList.add('hidden'); // Hide the modal
                modal.classList.remove('flex'); // Remove flex display
            }
        }
    </script>
@endsection
