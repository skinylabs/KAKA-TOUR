@extends('backend.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Tambah Data Hotel</h1>

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


    <form action="{{ route('tours.hotels.store', $tour->id) }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">
            <div>
                <label for="hotel_name" class="label">Nama Hotel:</label>
                <input type="text" name="hotel_name" class="textInput" required>
            </div>
            <div>
                <label for="participant_name" class="label">Nama Peserta:</label>
                <input type="text" name="participant_name" class="textInput" required>
            </div>
            <div>
                <label for="room_number" class="label">Nomor Kamar:</label>
                <input type="number" name="room_number" class="textInput" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Tambah Hotel</button>
            </div>
        </div>
    </form>
@endsection
