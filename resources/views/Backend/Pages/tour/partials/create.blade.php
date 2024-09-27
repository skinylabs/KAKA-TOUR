@extends('backend.app')

@section('content')
    <h1>Create Tour</h1>

    <form action="{{ route('tours.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Tour Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>

        <div>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>

        <div>
            <label for="user_id">Select User:</label>
            <select name="user_id" id="user_id" required>
                <option value="">-- Select User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create Tour</button>
    </form>
@endsection
