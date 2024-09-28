@extends('backend.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Create Tour</h1>

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

    <form action="{{ route('tours.store') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">

            <div>
                <label for="name" class="label">Tour Name:</label>
                <input type="text" name="name" id="name" class="textInput" required>
            </div>

            <div>
                <label for="start_date" class="label">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="textInput" required>
            </div>

            <div>
                <label for="end_date" class="label">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="textInput" required>
            </div>

            <div class="relative inline-block w-full text-gray-700">
                <label for="end_date" class="label">User:</label>
                <div class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 cursor-pointer"
                    id="custom-select">
                    <span id="selected-user">-- Select User --</span>
                    <svg class="w-5 h-5 absolute right-2 top-2.5 pointer-events-none" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10l5 5 5-5H7z" />
                    </svg>
                </div>
                <div class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 hidden" id="options">
                    @foreach ($users as $user)
                        <div class="p-2 hover:bg-gray-200 cursor-pointer" data-value="{{ $user->id }}">
                            {{ $user->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="user_id" id="user_id" required>

            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Create Tour</button>
            </div>
        </div>
    </form>
@endsection
