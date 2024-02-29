<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Inertia\Inertia;

class ChatController extends Controller
{
    // 
        /**
     * Chatview.
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Chat/Chat');
    }

}
