<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('services')->get();
        return response()->json(
            [
                'success' => true,
                'result' => $properties
            ]
        );
    }

    //http://127.0.0.1:8000/api/admin/properties File json

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
    public function show(Property $property)
    {
        $property = Property::with("user")->findOrFail($property->id);

        return response()->json([
            "success" => true,
            "results" => $property,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response()->noContent();
    }

    public function filter(Request $request)
    {

        // Validate de received data
        $validator = Validator::make($request->all(), [
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
            "radius" => "required|numeric|integer",
            "rooms" => "numeric|integer",
            "beds" => "numeric|integer",
            "services" => "string",
        ]);

        // If the validation fails return failure
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ]);
        }

        $latitude = $request["latitude"];
        $longitude = $request["longitude"];
        $radius = $request["radius"];

        $query = Property::with('services')->newQuery();

        // Filter the properties that are in the radius distance with haversine formula
        $query->selectRaw("*,
            ( 6371 * acos( cos( radians(" . $latitude . ") ) *
            cos( radians(properties.latitude) ) *
            cos( radians(properties.longitude) - radians(" . $longitude . ") ) +
            sin( radians(" . $latitude . ") ) *
            sin( radians(properties.latitude) ) ) )
            AS distance")
        ->having("distance", "<", $radius)
        ->orderBy("distance")
        ->get();

        if ($request->has('rooms')){
            $query->where('rooms','>=', $request->rooms);
        }

        if ($request->has('beds')){
            $query->where('beds', '>=', $request->beds);
        }


        if($request->has('services')){
            $services = explode('-',$request->services);

            $query->whereHas('services', function ($query) use ($services) {
                $query->whereIn('id', $services);
            }, '=', count($services));

        }

        // Return filtered properties
        return response()->json([
            "success" => true,
            "result" => $query->get()
        ]);
    }
}