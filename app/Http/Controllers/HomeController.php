<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()) 
        {
            return redirect(route('home'));
        } else 
        {
            return view('welcome');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function subscriptions() {
        return view('subscriptions');
    }

    public function discover() {
        return view('discover');
    }

    public function podcast($id) {
        return view('podcast');
    }

    public function category($id) {
        return view('category');
    }

    public function search() {
        return view('search');
    }
}
