<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Check if user is creator or not
        $user = auth()->user();
        
        if($user->creator)
            return view('creators.myPodcasts');
        else
            return view('creators.become');
    }

    public function newPodcast()
    {
        return view('creators.newPodcast');
    }
}
