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
     * Fetches all messages in descending order of creation.
     */
    public function index()
{
    $messages = Message::with('property')->orderBy('created_at', 'desc')->get();
    return view('admin.messages.index', compact('messages'));
}



    /**
     * Store a newly created resource in storage.
     * Validates and saves a new message.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_name' => 'required|string|max:50',
            'sender_last_name' => 'required|string|max:50',
            'sender_email' => 'required|email|max:255',
            'message' => 'required|string',
            'property_id' => 'required|exists:properties,id', // Ensures property exists in database
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $message = Message::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Message saved successfully',
            'data' => $message,
        ], 201);
    }

    /**
     * Display the specified resource.
     * Fetches a single message and displays it in a view.
     */
    public function show($id)
    {
        $message = Message::with('property')->find($id);

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     * Handles updates for a message.
     */
    public function update(Request $request, $id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'sender_name' => 'sometimes|required|string|max:50',
            'sender_last_name' => 'sometimes|required|string|max:50',
            'sender_email' => 'sometimes|required|email|max:255',
            'message' => 'sometimes|required|string',
            'property_id' => 'sometimes|required|exists:properties,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $message->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Message updated successfully',
            'data' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * Deletes a message.
     */
    public function destroy($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully',
        ]);
    }
}