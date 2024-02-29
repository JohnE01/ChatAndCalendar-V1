<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #$groups = auth()->user()->groups;

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        return view('home', [/* 'groups' => $groups,  'users' => $users, */ 'user' => $user]);
    }
}
