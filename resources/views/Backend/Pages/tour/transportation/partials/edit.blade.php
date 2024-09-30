@extends('backend.app')

@section('content')
    <h1>Edit Transportasi</h1>
    <form action="{{ route('transportations.update', $transportation) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="tour_id">Tur:</label>
            <select name="tour_id" required>
                @foreach ($tours as $tour)
                    <option value="{{ $tour->id }}" {{ $tour->id == $transportation->tour_id ? 'selected' : '' }}>
                        {{ $tour->tour_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="vehicle_type">Jenis Kendaraan:</label>
            <input type="text" name="vehicle_type" value="{{ $transportation->vehicle_type }}" required>
        </div>
        <div>
            <label for="participant_name">Nama Peserta:</label>
            <input type="text" name="participant_name" value="{{ $transportation->participant_name }}" required>
        </div>
        <div>
            <label for="group">Kelompok:</label>
            <input type="text" name="group" value="{{ $transportation->group }}" required>
        </div>
        <div>
            <label for="room_number">Nomor Kamar:</label>
            <input type="text" name="room_number" value="{{ $transportation->room_number }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
