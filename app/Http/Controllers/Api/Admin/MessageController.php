<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_name' => 'required|string|max:50',
            'sender_last_name' => 'required|string|max:50',
            'sender_email' => 'required|email|max:255',
            'message' => 'required|string',
            'property_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $message = new Message();
        $message->sender_name = $request->input('sender_name');
        $message->sender_last_name = $request->input('sender_last_name');
        $message->sender_email = $request->input('sender_email');
        $message->message = $request->input('message');
        $message->property_id = $request->input('property_id');
        $message->save();

        return response()->json([
            'success' => true,
            'message' => 'Message saved successfully',
            'result' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}