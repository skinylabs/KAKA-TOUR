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
    public function index()
    {

        $transportations = Transportation::all();
        return view('backend.pages.tour.transportation.index', compact('transportations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('backend.pages.tour.transportation.partials.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'vehicle' => 'required|string',
            'name' => 'required|string',
            'group' => 'required|string',
            'room_number' => 'required|string',
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

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data berhasil diimport.');
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
    public function edit(Transportation $transportation)
    {
        return view('backend.pages.tour.transportation.edit', compact('transportation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transportation $transportation)
    {
        $request->validate([
            'vehicle' => 'required|string',
            'name' => 'required|string',
            'group' => 'required|string',
            'room_number' => 'required|string',
        ]);

        $transportation->update($request->all());

        return redirect()->route('transportations.index')->with('success', 'Transportasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportation $transportation)
    {
        $transportation->delete();
        return redirect()->route('transportations.index')->with('success', 'Transportasi berhasil dihapus.');
    }
}
