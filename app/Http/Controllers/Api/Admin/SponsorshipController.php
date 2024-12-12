<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Sponsorship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorships = Sponsorship::with('properties')->get();
        return response()->json(
            [
                'success' => true,
                'result' => $sponsorships
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsorship $sponsorship)
    {
        $sponsorship = Sponsorship::with("properties", "properties.user")->findOrFail($sponsorship->id);

        return response()->json([
            "success" => true,
            "results" => $sponsorship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }
}
