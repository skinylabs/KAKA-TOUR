<?php

namespace App\Http\Controllers;

use App\Imports\HotelImport;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $hotels = Hotel::all();
        return view('backend.pages.tour.pages.hotel.index', compact('hotels', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('backend.pages.tour.pages.hotel.partials.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'hotel_name' => 'required|string|max:128',
            'participant_name' => 'required|string|max:128',
            'room_number' => 'required|string|max:128',
        ]);

        // Simpan dengan menambahkan tour_id
        Hotel::create([
            'tour_id' => $tour->id,
            'hotel_name' => $request->hotel_name,
            'participant_name' => $request->participant_name,
            'room_number' => $request->room_number,
        ]);

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Hotel berhasil ditambahkan.');
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new HotelImport($tour->id), $request->file('file'));

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Hotel berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, Hotel $hotel)
    {
        return view('backend.pages.tour.pages.hotel.partials.edit', compact('hotel', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tour $tour, Request $request, Hotel $hotel)
    {
        // Validasi input
        $request->validate([
            'hotel_name' => 'required|string|max:128',
            'participant_name' => 'required|string|max:128',
            'room_number' => 'required|string|max:128',
        ]);

        // Update data
        $hotel->update([
            'hotel_name' => $request->hotel_name,
            'participant_name' => $request->participant_name,
            'room_number' => $request->room_number,
        ]);

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Hotel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('tours.show', $tour->id)->with('success', 'Transportasi berhasil dihapus.');
    }
}
