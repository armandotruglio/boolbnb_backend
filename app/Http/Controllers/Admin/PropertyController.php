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
        return view("admin.properties.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $formData = $request->validated();

        $property = Property::create($formData);

        return redirect()->route("admin.properties.show", ["id" => $property->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $property = Property::findOrFail($property);
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $property = Property::all();
        return view("admin.property.edit", compact("property"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $data = $request->validated();
        $property->update($data);
        return redirect()->route("admin.property.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Appartamento eliminato con successo!');
    }
}