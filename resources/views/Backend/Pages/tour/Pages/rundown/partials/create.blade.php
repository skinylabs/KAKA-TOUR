@extends('backend.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Rundown Kegiatan</h1>

            <div class="text-sm sm:text-base ">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="/tours" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">Tours</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Create</p>
                    </li>
                </ol>
            </div>

        </div>
    </div>


    <form action="{{ route('tours.rundowns.store', $tour->id) }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">
            <div>
                <label for="activity_date" class="label">Tanggal:</label>
                <input type="date" name="activity_date" class="textInput" required>
            </div>
            <div>
                <label for="activity_time" class="label">Waktu:</label>
                <input type="time" name="activity_time" class="textInput" required>
            </div>
            <div>
                <label for="location" class="label">Lokasi:</label>
                <input type="text" name="location" class="textInput" required>
            </div>
            <div>
                <label for="activity" class="label">Kegiatan:</label>
                <input type="text" name="activity" class="textInput" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Tambah Hotel</button>
            </div>
        </div>
    </form>
@endsection
