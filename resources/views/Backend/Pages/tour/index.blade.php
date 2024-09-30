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
                        <tr class="border-dashed border-t border-gray-200">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $tour->name }}</td>
                            <td class="p-2">{{ $tour->start_date }}</td>
                            <td class="p-2">{{ $tour->end_date }}</td>
                            <td class="p-2">{{ $tour->user->name }}</td>
                            <td class="p-2">
                                <div class="flex justify-evenly">
                                    <a href="{{ route('tours.show', $tour->id) }}">View</a>
                                    <a href="{{ route('tours.edit', $tour->id) }}">Edit</a>
                                    <button class="text-red-500 delete-btn" data-id="{{ $tour->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Apakah Anda yakin ingin menghapus data ini?</h2>
                <div class="flex justify-end space-x-4">
                    <button id="cancel-btn" class="bg-gray-500 text-white px-4 py-2 rounded">Tidak</button>
                    <form id="delete-form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get modal elements
            const modal = document.getElementById('modal');
            const deleteForm = document.getElementById('delete-form');
            const cancelBtn = document.getElementById('cancel-btn');

            // Handle delete button click
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tourId = this.getAttribute('data-id');
                    // Set form action to the correct route
                    deleteForm.setAttribute('action', `/tours/${tourId}`);
                    // Show the modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            // Handle cancel button click
            cancelBtn.addEventListener('click', function() {
                // Hide the modal
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });

            // Close modal when clicking outside the modal content
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
@endsection
