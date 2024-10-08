<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Rundown;
use App\Models\Tour;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::all();
        return view('backend.pages.tour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('backend.pages.tour.partials.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        Tour::create($request->all());
        return redirect()->route('tours.index')->with('success', 'Tour created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        $transportations = Transportation::where('tour_id', $tour->id)->get();
        $hotels = Hotel::where('tour_id', $tour->id)->get();
        $rundowns = Rundown::where('tour_id', $tour->id)->get();

        return view('backend.pages.tour.partials.show', compact('tour', 'transportations', 'hotels', 'rundowns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $users = User::all();
        return view('backend.pages.tour.partials.edit', compact('users', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'user_id' => 'required|exists:users,id',
        ]);

        $tour->update($request->all());
        return redirect()->route('tours.index')->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'Tour deleted successfully.');
    }
}
