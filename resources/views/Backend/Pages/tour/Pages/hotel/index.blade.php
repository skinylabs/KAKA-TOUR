@extends('Backend.app')

@section('content')
    <h1>Daftar Transportasi</h1>

    <a href="{{ route('tours.hotels.create', $tour->id) }}"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
        Hotel</a>

    <!-- Tombol untuk membuka modal hotel -->
    <button onclick="document.getElementById('importHotelModal').classList.remove('hidden')"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
        Import Hotel
    </button>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">No</th>
                <th class="border border-gray-300 p-2">Nama Hotel</th>
                <th class="border border-gray-300 p-2">Nama Peserta</th>
                <th class="border border-gray-300 p-2">Nomor Kamar</th>
                <th class="border border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($hotels->isEmpty())
                <tr>
                    <td colspan="6"class="w-full text-center ">Belum ada data</td>
                </tr>
            @else
                @foreach ($hotels as $hotel)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 p-2">{{ $hotel->hotel_name }}</td>
                        <td class="border border-gray-300 p-2">{{ $hotel->participant_name }}</td>
                        <td class="border border-gray-300 p-2">{{ $hotel->room_number }}</td>
                        <td class="border border-gray-300 p-2 flex justify-evenly">
                            <a href="{{ route('tours.hotels.edit', [$tour->id, $hotel->id]) }}">Edit</a>
                            <button class="text-red-500 delete-btn" data-id="{{ $tour->id }}"
                                data-hotel-id="{{ $hotel->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Modal untuk Konfirmasi Penghapusan -->
    <div id="modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75  items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
            <p class="mt-2 text-gray-600">Apakah Anda yakin ingin menghapus item ini?</p>
            <form id="delete-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex justify-end mt-4">
                    <button type="button" id="cancel-btn"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300">Batal</button>
                    <button type="submit"
                        class="ml-2 px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal untuk Import Hotel -->
    <x-backend.ui.modal.import-modal id="importHotelModal" title="Import Hotel"
        action-url="{{ route('tours.hotels.import', $tour->id) }}" />
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const deleteForm = document.getElementById('delete-form');
            const cancelBtn = document.getElementById('cancel-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tourId = this.getAttribute('data-id');
                    let entityId; // Variable untuk menyimpan id yang akan dihapus
                    let url; // Variable untuk menyimpan url

                    // Memeriksa apakah tombol adalah untuk transportasi atau hotel
                    if (this.hasAttribute('data-transportation-id')) {
                        entityId = this.getAttribute('data-transportation-id');
                        url = `/tours/${tourId}/transportations/${entityId}`;
                    } else if (this.hasAttribute('data-hotel-id')) {
                        entityId = this.getAttribute('data-hotel-id');
                        url = `/tours/${tourId}/hotels/${entityId}`; // Update URL untuk hotel
                    }

                    deleteForm.setAttribute('action', url);
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            cancelBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
