@extends('backend.app')

@section('content')
    <h1>Tambah Transportasi</h1>

    <form action="{{ route('tours.transportations.store', $tour->id) }}" method="POST">
        @csrf

        <div>
            <label for="vehicle">Tipe Kendaraan:</label>
            <input type="text" name="vehicle" required>
        </div>
        <div>
            <label for="name">Nama Peserta:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="group">Kelompok:</label>
            <input type="text" name="group" required>
        </div>
        <div>
            <label for="room_number">Nomor Kamar:</label>
            <input type="text" name="room_number" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
