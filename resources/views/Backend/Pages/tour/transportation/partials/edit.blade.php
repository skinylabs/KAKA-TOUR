@extends('Backend.app')

@section('content')
    <h1>Edit Transportasi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tours.transportations.update', [$tour->id, $transportation->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="vehicle" class="block text-gray-700">Tipe Kendaraan</label>
            <input type="text" name="vehicle" id="vehicle" class="w-full p-2 border border-gray-300"
                value="{{ old('vehicle', $transportation->vehicle) }}" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama Peserta</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300"
                value="{{ old('name', $transportation->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="group" class="block text-gray-700">Kelompok</label>
            <input type="text" name="group" id="group" class="w-full p-2 border border-gray-300"
                value="{{ old('group', $transportation->group) }}" required>
        </div>

        <div class="mb-4">
            <label for="room_number" class="block text-gray-700">Nomor Kamar</label>
            <input type="text" name="room_number" id="room_number" class="w-full p-2 border border-gray-300"
                value="{{ old('room_number', $transportation->room_number) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Transportasi</button>
    </form>
@endsection
