@extends('Backend.app')

@section('content')
    <h1>{{ $tour->name }}</h1>
    <p>Start Date: {{ $tour->start_date }}</p>
    <p>End Date: {{ $tour->end_date }}</p>
    <p>User ID: {{ $tour->user_id }}</p>
    <a href="{{ route('tours.index') }}">Back to Tours</a>
@endsection
