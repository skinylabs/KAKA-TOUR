@extends('Backend.app')

@section('content')
    <h1>Edit Hotel</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tours.rundowns.update', [$tour->id, $rundown->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="activity_date" class="block text-gray-700">Tanggal</label>
            <input type="date" name="activity_date" id="activity_date" class="w-full p-2 border border-gray-300"
                value="{{ old('activity_date', $rundown->activity_date) }}" required>
        </div>

        <div class="mb-4">
            <label for="activity_time" class="block text-gray-700">Waktu</label>
            <input type="time" name="activity_time" id="activity_time" class="w-full p-2 border border-gray-300"
                value="{{ old('activity_time', $rundown->activity_time) }}" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-gray-700">Lokasi</label>
            <input type="text" name="location" id="location" class="w-full p-2 border border-gray-300"
                value="{{ old('location', $rundown->location) }}" required>
        </div>

        <div class="mb-4">
            <label for="activity" class="block text-gray-700">Kegiatan</label>
            <input type="text" name="activity" id="activity" class="w-full p-2 border border-gray-300"
                value="{{ old('activity', $rundown->activity) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Transportasi</button>
    </form>
@endsection
