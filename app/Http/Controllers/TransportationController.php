<?php

namespace App\Http\Controllers;

use App\Imports\TransportationImport;
use App\Models\Tour;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {

        $transportations = Transportation::all();
        return view('backend.pages.tour.pages.transportation.index', compact('transportations', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('backend.pages.tour.pages.transportation.partials.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'vehicle' => 'required|string|max:128',
            'name' => 'required|string|max:128',
            'group' => 'required|string|max:128',
            'room_number' => 'required|string|max:128',
        ]);

        // Simpan dengan menambahkan tour_id
        Transportation::create([
            'tour_id' => $tour->id,
            'vehicle' => $request->vehicle,
            'name' => $request->name,
            'group' => $request->group,
            'room_number' => $request->room_number,
        ]);

        return redirect()->route('tours.show', $tour->id)->with('success', 'Transportasi berhasil ditambahkan.');
    }

    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new TransportationImport($tour->id), $request->file('file'));

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Transportasi berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, Transportation $transportation)
    {
        return view('backend.pages.tour.pages.transportation.partials.edit', compact('transportation', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour, Transportation $transportation)
    {
        // Validasi input
        $request->validate([
            'vehicle' => 'required|string',
            'name' => 'required|string',
            'group' => 'required|string',
            'room_number' => 'required|string',
        ]);

        // Update data
        $transportation->update([
            'vehicle' => $request->vehicle,
            'name' => $request->name,
            'group' => $request->group,
            'room_number' => $request->room_number,
        ]);

        return redirect()->route('tours.show', $tour->id)->with('success', 'Transportasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, Transportation $transportation)
    {
        $transportation->delete();
        return redirect()->route('tours.show', $tour->id)->with('success', 'Transportasi berhasil dihapus.');
    }
}
