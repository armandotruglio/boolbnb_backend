<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $exist = View::where('user_ip',$request["user_ip"])->where('property_id',$request["property_id"])->exists();

        if($exist){
            return response()->json([
                "succes" => true,
                "result" => 'already exists'
            ]);
        }
        else{
            View::create($request->all());
            return response()->json([
                "succes" => true,
                "result" => 'registered'
            ]);
        }
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