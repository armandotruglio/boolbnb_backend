<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Address;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        return view("admin.properties.create", compact("property"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $formData = $request->validated();

        $formData["user_id"] = Auth::user()->id;

        $query = Address::encodeQueryAddress($formData["address"]);

        $result = json_decode(Address::buildApi($query));

        $formData["latitude"] = $result->results['0']->position->lat;
        $formData["longitude"] = $result->results['0']->position->lon;

        if ($request->hasFile("thumb_url")) {
            $filePath = Storage::disk("public")->put("img/projects/", $request->thumb_url);
            $data["thumb_url"] = $filePath;
        } else {
            $data["thumb_url"] = NULL;
        }


        $property = Property::create($formData);


        return redirect()->route("admin.properties.index")
            ->with('message', "Project $property->title has been created successfully!")
            ->with('alert-class', "success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view("admin.properties.edit", compact("property"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $data = $request->validated();

        $query = Address::encodeQueryAddress($data["address"]);

        $result = json_decode(Address::buildApi($query));

        $data["latitude"] = $result->results['0']->position->lat;
        $data["longitude"] = $result->results['0']->position->lon;


        if ($request->hasFile("thumb_url")) {
            if ($property->thumb_url) {
                Storage::disk("public")->delete($property->thumb_url);
            }

            $filePath = Storage::disk("public")->put("img/properties/", $request->thumb_url);
            $data["thumb_url"] = $filePath;
        }

        $property->update($data);


        return redirect()->route("admin.properties.index")
            ->with('message', "Project $property->title has been updated successfully!")
            ->with('alert-class', "primary");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted succesfully')
            ->with('alert-class', "danger");;
    }
}
