@extends('Backend.app')

@section('content')
    <h1>Daftar Transportasi</h1>

    <a href="{{ route('tours.transportations.create', $tour->id) }}" class="btn btn-primary">Tambah Transportasi</a>

    <form action="{{ route('tours.transportations.import', $tour->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-success">Impor Data</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">Tour</th>
                <th class="border border-gray-300 p-2">Tipe Kendaraan</th>
                <th class="border border-gray-300 p-2">Nama Peserta</th>
                <th class="border border-gray-300 p-2">Kelompok</th>
                <th class="border border-gray-300 p-2">Nomor Kamar</th>
                <th class="border border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transportations as $transportation)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $transportation->tour->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $transportation->vehicle }}</td>
                    <td class="border border-gray-300 p-2">{{ $transportation->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $transportation->group }}</td>
                    <td class="border border-gray-300 p-2">{{ $transportation->room_number }}</td>
                    <td class="border border-gray-300 p-2">

                        <div class="flex justify-evenly">
                            <a href="{{ route('tours.transportations.edit', [$tour->id, $transportation->id]) }}">Edit</a>
                            <button class="text-red-500 delete-btn" data-id="{{ $tour->id }}"
                                data-transportation-id="{{ $transportation->id }}">Delete</button>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Apakah Anda yakin ingin menghapus data ini?</h2>
            <div class="flex justify-end space-x-4">
                <button id="cancel-btn" class="bg-gray-500 text-white px-4 py-2 rounded">Tidak</button>
                <form id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Ya</button>
                </form>
            </div>
        </div>
    </div>

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get modal elements
            const modal = document.getElementById('modal');
            const deleteForm = document.getElementById('delete-form');
            const cancelBtn = document.getElementById('cancel-btn');

            // Handle delete button click
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tourId = this.getAttribute('data-id');
                    const transportationId = this.getAttribute('data-transportation-id');
                    // Set form action to the correct route
                    deleteForm.setAttribute('action',
                        `/tours/${tourId}/transportations/${transportationId}`);
                    // Show the modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            // Handle cancel button click
            cancelBtn.addEventListener('click', function() {
                // Hide the modal
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });

            // Close modal when clicking outside the modal content
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
@endsection
