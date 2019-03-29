<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
 
>>>>>>> dc9fbd868f0a080b76464e62cbfc067133fa6d33

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
