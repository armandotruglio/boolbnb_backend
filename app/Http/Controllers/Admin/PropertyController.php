<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
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