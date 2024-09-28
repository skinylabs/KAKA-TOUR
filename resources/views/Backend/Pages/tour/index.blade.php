@extends('Backend.app')
@section('content')
    <div class="w-full flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">Tours</h1>

                <div class="text-sm sm:text-base ">
                    <ol class="list-none p-0 inline-flex space-x-2">
                        <li class="flex items-center">
                            <a href="/tours" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                                TOUR</a>
                            <p class="ml-2">/</p>
                        </li>
                        <li class="flex items-center">
                            <p class="text-gray-800">Tours</p>
                        </li>
                    </ol>
                </div>

            </div>
            <a href="{{ route('tours.create') }}" class="button-primary">Create New Tour</a>
        </div>



        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px]">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3 ">
                            <span>No</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Name</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Start Date</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>End Date</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>User ID</span>
                        </th>
                        <th class="px-6 py-3 ">
                            <span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                        {{-- @for ($i = 1; $i <= 100; $i++) --}}
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $tour->name }}</td>
                            <td class="p-2">{{ $tour->start_date }}</td>
                            <td class="p-2">{{ $tour->end_date }}</td>
                            <td class="p-2">{{ $tour->user->name }}</td>
                            <td class=" p-2">
                                <div class="flex justify-evenly">
                                    <a href="{{ route('tours.show', $tour->id) }}">View</a>
                                    <a href="{{ route('tours.edit', $tour->id) }}">Edit</a>
                                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        {{-- @endfor --}}
                    @endforeach
                </tbody>

            </table>
        </div>
    @endsection
