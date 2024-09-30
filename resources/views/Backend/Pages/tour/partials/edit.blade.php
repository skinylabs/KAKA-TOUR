@extends('Backend.app')

@section('content')
    <h1>Edit Tour</h1>
    {{-- <form action="{{ route('tours.update', $tour->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $tour->name }}" required>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" value="{{ $tour->start_date }}" required>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" value="{{ $tour->end_date }}" required>

        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" id="user_id" value="{{ $tour->user_id }}" required>

        <button type="submit">Update</button>
    </form> --}}

    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-4">

            <div>
                <label for="name" class="label">Tour Name:</label>
                <input type="text" name="name" id="name" class="textInput" value="{{ $tour->name }}" required>
            </div>

            <div>
                <label for="start_date" class="label">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="textInput" value="{{ $tour->start_date }}"
                    required>
            </div>

            <div>
                <label for="end_date" class="label">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="textInput" value="{{ $tour->end_date }}"
                    required>
            </div>

            <div class="relative inline-block w-full text-gray-700">
                <label for="end_date" class="label">User:</label>
                <div class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 cursor-pointer"
                    id="custom-select">
                    <span id="selected-user">{{ $tour->user->name }}</span>
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
            <input type="hidden" name="user_id" id="user_id" value="{{ $tour->user_id }}" required>

            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Edit Tour</button>
            </div>
        </div>
    </form>
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const customSelect = document.getElementById("custom-select");
            const optionsContainer = document.getElementById("options");
            const selectedUser = document.getElementById("selected-user");
            const hiddenInput = document.getElementById("user_id"); // Ambil input tersembunyi

            customSelect.addEventListener("click", function() {
                optionsContainer.classList.toggle("hidden");
            });

            optionsContainer.addEventListener("click", function(event) {
                const value = event.target.dataset.value;
                const name = event.target.innerText;

                if (value) {
                    selectedUser.innerText = name;
                    hiddenInput.value = value; // Set value ke input tersembunyi
                }

                optionsContainer.classList.add("hidden");
            });
        });
    </script>
@endsection
@endsection
