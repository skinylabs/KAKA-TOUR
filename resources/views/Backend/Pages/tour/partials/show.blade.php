@extends('Backend.app')

@section('content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                {{ $tour->name }}
            </h1>

            <div class="text-sm sm:text-base">
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
    </div>
    <section>
        <div class="flex justify-between items-center mt-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">TRANSPORTATION</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tours.transportations.create', $tour->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                    Transportasi</a>

                <!-- Tombol untuk membuka modal transportasi -->
                <button onclick="document.getElementById('importTransportModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import Transportasi
                </button>

                {{-- <button onclick="openModal()"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import dari Excel
                </button> --}}
            </div>
        </div>


        <x-backend.ui.flash-message :message="session('success')" type="success" id="toast-success" />

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Armada</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Kelompok</th>
                        <th class="px-6 py-3">Nomer Kamar</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transportations->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($transportations as $transportation)
                            <tr class="border-dashed border-t border-gray-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $transportation->vehicle }}</td>
                                <td class="p-2">{{ $transportation->name }}</td>
                                <td class="p-2">{{ $transportation->group }}</td>
                                <td class="p-2">{{ $transportation->room_number }}</td>
                                <td class="p-2">
                                    <div class="flex justify-evenly">
                                        <a
                                            href="{{ route('tours.transportations.edit', [$tour->id, $transportation->id]) }}">Edit</a>
                                        <button class="text-red-500 delete-btn" data-id="{{ $tour->id }}"
                                            data-transportation-id="{{ $transportation->id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="flex justify-between items-center mt-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">HOTEL</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tours.hotels.create', $tour->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                    Hotel</a>
                <!-- Tombol untuk membuka modal hotel -->
                <button onclick="document.getElementById('importHotelModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import Hotel
                </button>
                {{-- <button onclick="openModal()"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import dari Excel
                </button> --}}
            </div>
        </div>


        <x-backend.ui.flash-message :message="session('success')" type="success" id="toast-success" />
        <x-backend.ui.flash-message :message="session('error')" type="error" id="toast-error" />

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Hotel</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Nomer Kamar</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hotels->isEmpty())
                        <tr>
                            <td colspan="6"class="w-full text-center ">Belum ada data</td>
                        </tr>
                    @else
                        @foreach ($hotels as $hotel)
                            <tr class="border-dashed border-t border-gray-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $hotel->hotel_name }}</td>
                                <td class="p-2">
                                    {{ $hotel->participant_name }}
                                </td>
                                <td class="p-2">{{ $hotel->room_number }}</td>
                                <td class="p-2">
                                    <div class="flex justify-evenly">
                                        <a href="{{ route('tours.hotels.edit', [$tour->id, $hotel->id]) }}">Edit</a>
                                        <button class="text-red-500 delete-btn" data-id="{{ $tour->id }}"
                                            data-hotel-id="{{ $hotel->id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <div class="flex justify-between items-center mt-6">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">RUNDOWN KEGIATAN</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tours.rundowns.create', $tour->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah
                    Kegiatan</a>
                <!-- Tombol untuk membuka modal hotel -->
                <button onclick="document.getElementById('importRundownModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import Rundown
                </button>
                {{-- <button onclick="openModal()"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                    Import dari Excel
                </button> --}}
            </div>
        </div>


        <x-backend.ui.flash-message :message="session('success')" type="success" id="toast-success" />

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow overflow-y-auto relative h-[400px] mt-4">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative text-center">
                <thead>
                    <tr class="bg-slate-200 sticky top-0 text-gray-600 font-bold text-sm uppercase">
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Waktu</th>
                        <th class="px-6 py-3">Lokasi</th>
                        <th class="px-6 py-3">Kegiatan</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($rundowns->isEmpty())
                        <tr>
                            <td colspan="6"class="w-full text-center ">Belum ada data</td>
                        </tr>
                    @else
                        @foreach ($rundowns as $rundown)
                            <tr class="border-dashed border-t border-gray-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $rundown->activity_date }}</td>
                                <td class="p-2">
                                    {{ $rundown->activity_time }}
                                </td>
                                <td class="p-2">{{ $rundown->location }}</td>
                                <td class="p-2">{{ $rundown->activity }}</td>
                                <td class="p-2">
                                    <div class="flex justify-evenly">
                                        <a href="{{ route('tours.rundowns.edit', [$tour->id, $rundown->id]) }}">Edit</a>
                                        <button class="text-red-500 delete-btn" data-id="{{ $tour->id }}"
                                            data-rundown-id="{{ $rundown->id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>

    <!-- Modal untuk Import Transportasi -->
    <x-backend.ui.modal.import-modal id="importTransportModal" title="Import Transportasi"
        action-url="{{ route('tours.transportations.import', $tour->id) }}" />

    <!-- Modal untuk Import Hotel -->
    <x-backend.ui.modal.import-modal id="importHotelModal" title="Import Hotel"
        action-url="{{ route('tours.hotels.import', $tour->id) }}" />

    <!-- Modal untuk Import Hotel -->
    <x-backend.ui.modal.import-modal id="importRundownModal" title="Import Rundown"
        action-url="{{ route('tours.rundowns.import', $tour->id) }}" />

    <!-- Modal untuk Konfirmasi Penghapusan -->
    <div id="modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75  items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
            <p class="mt-2 text-gray-600">Apakah Anda yakin ingin menghapus item ini?</p>
            <form id="delete-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex justify-end mt-4">
                    <button type="button" id="cancel-btn"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300">Batal</button>
                    <button type="submit"
                        class="ml-2 px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">Hapus</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const deleteForm = document.getElementById('delete-form');
            const cancelBtn = document.getElementById('cancel-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tourId = this.getAttribute('data-id');
                    let entityId; // Variable untuk menyimpan id yang akan dihapus
                    let url; // Variable untuk menyimpan url

                    // Memeriksa apakah tombol adalah untuk transportasi atau hotel
                    if (this.hasAttribute('data-transportation-id')) {
                        entityId = this.getAttribute('data-transportation-id');
                        url = `/tours/${tourId}/transportations/${entityId}`;
                    } else if (this.hasAttribute('data-hotel-id')) {
                        entityId = this.getAttribute('data-hotel-id');
                        url = `/tours/${tourId}/hotels/${entityId}`; // Update URL untuk hotel
                    } else if (this.hasAttribute('data-rundown-id')) {
                        entityId = this.getAttribute('data-rundown-id');
                        url = `/tours/${tourId}/rundowns/${entityId}`; // Update URL untuk hotel
                    }

                    deleteForm.setAttribute('action', url);
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            cancelBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
