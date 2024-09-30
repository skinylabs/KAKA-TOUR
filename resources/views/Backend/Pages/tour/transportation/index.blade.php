@extends('Backend.app')

@section('content')
    <h1>Daftar Transportasi</h1>

    <a href="{{ route('transportations.create') }}" class="btn btn-primary">Tambah Transportasi</a>

    <form action="{{ route('transportations.import') }}" method="POST" enctype="multipart/form-data">
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
                        <a href="{{ route('transportations.edit', $transportation->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('transportations.destroy', $transportation->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
