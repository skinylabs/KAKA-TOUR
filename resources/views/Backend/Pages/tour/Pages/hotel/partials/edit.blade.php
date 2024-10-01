@extends('Backend.app')

@section('content')
    <h1>Edit Hotel</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tours.hotels.update', [$tour->id, $hotel->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="hotel_name" class="block text-gray-700">Nama Hotel</label>
            <input type="text" name="hotel_name" id="hotel_name" class="w-full p-2 border border-gray-300"
                value="{{ old('hotel_name', $hotel->hotel_name) }}" required>
        </div>

        <div class="mb-4">
            <label for="participant_name" class="block text-gray-700">Nama Peserta</label>
            <input type="text" name="participant_name" id="participant_name" class="w-full p-2 border border-gray-300"
                value="{{ old('participant_name', $hotel->participant_name) }}" required>
        </div>

        <div class="mb-4">
            <label for="room_number" class="block text-gray-700">Nomor Kamar</label>
            <input type="text" name="room_number" id="room_number" class="w-full p-2 border border-gray-300"
                value="{{ old('room_number', $hotel->room_number) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Transportasi</button>
    </form>
@endsection
