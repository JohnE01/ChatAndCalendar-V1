<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->limit(50)->get();
        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255'
        ]);

        $message = auth()->user()->messages()->create([
            'content' => $request->content
        ]);

        return response()->json($message);
    }
}
