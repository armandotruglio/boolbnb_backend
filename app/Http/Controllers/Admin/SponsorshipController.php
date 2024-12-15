<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        $properties = Property::where('user_id', Auth::user()->id)->where('is_visible', true)->doesntHave('sponsorships')->get();
        return view('admin.sponsorships.index', compact('sponsorships', 'properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'property' => 'required|exists:properties,id',
            'sponsorship' => 'required|in:24,72,144' // 'in' => 'The :attribute must be one of the following types: :values',
        ]);

        $property = Property::where('user_id', Auth::user()->id)->where('is_visible', true)->doesntHave('sponsorships')->get();
        $propertyIds = [];
        for ($i = 0; $i < count($property); $i++) {
            array_push($propertyIds, $property[$i]->id);
        }

        if (!in_array(intval($request->property), $propertyIds)) {
            return redirect()->back();
        }
        //property ID
        $propertyId = Property::findOrFail($request->property);

        //duration of sponsorship
        $duration = $request->sponsorship;

        //find the sposorship with the duration
        $sponsorshipId = Sponsorship::where('duration', $duration)->first()->id;

        //take this time moment
        $now = now();
        //caloclate the end date
        $endDate = $now->copy()->addHours($duration);

        $propertyId->sponsorships()->attach($sponsorshipId, [
            'end_date' => $endDate
        ]);


        return redirect()->route("admin.properties.index");
        //@dd($duration, "propertuid", $propertyId, "sponsid", $sponsorshipId, $endDate);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}