@extends('Backend.app')

@section('content')
    <h1>Edit Tour</h1>
    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
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
    </form>
@endsection
