<?php

namespace App\Http\Controllers;

use App\Imports\RundownImport;
use App\Models\Hotel;
use App\Models\Rundown;
use App\Models\Tour;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RundownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $rundowns = Rundown::all();
        return view('backend.pages.tour.pages.rundown.index', compact('rundowns', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        return view('backend.pages.tour.pages.rundown.partials.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tour $tour)
    {
        // Validasi input
        $request->validate([
            'activity_date' => 'required|string|max:128',
            'activity_time' => 'required|string|max:128',
            'location' => 'required|string|max:128',
            'activity' => 'required|string|max:255',
        ]);

        // Simpan dengan menambahkan tour_id
        Rundown::create([
            'tour_id' => $tour->id,
            'activity_date' => $request->activity_date,
            'activity_time' => $request->activity_time,
            'location' => $request->location,
            'activity' => $request->activity,
        ]);

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Rundown berhasil ditambahkan.');
    }


    public function import(Request $request, Tour $tour)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        // Import data dari file dengan tour_id dari route
        Excel::import(new RundownImport($tour->id), $request->file('file'));

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Rundown berhasil diimport.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rundown $rundown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour, Rundown $rundown)
    {
        return view('backend.pages.tour.pages.rundown.partials.edit', compact('rundown', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tour $tour, Request $request, Rundown $rundown)
    {
        // Validasi input
        $request->validate([
            'activity_date' => 'required|string|max:128',
            'activity_time' => 'required|string|max:128',
            'location' => 'required|string|max:128',
            'activity' => 'required|string|max:255',
        ]);

        // Update data
        $rundown->update([
            'activity_date' => $request->activity_date,
            'activity_time' => $request->activity_time,
            'location' => $request->location,
            'activity' => $request->activity,
        ]);

        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Hotel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, Rundown $rundown)
    {
        $rundown->delete();
        return redirect()->route('tours.show', $tour->id)->with('success', 'Data Rundown berhasil dihapus.');
    }
}
