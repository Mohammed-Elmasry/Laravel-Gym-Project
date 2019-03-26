<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Coach\StoreCoachRequest;
use App\Coach;

class CoachesController extends Controller
{
 
    public function index()
    {
        return view('coaches.index', [
            'coaches' => Coach::all()
        ]);
    }
    public function create()
    {
        $coaches = Coach::all();
        return view('coaches.create',[
            'coaches' => $coaches,
        ]);
    }
    public function store(StoreCoachRequest $request)
    {
        Coach::create(request()->all());
        return redirect()->route('coaches.create');
    }
    public function show(Coach $coach)
    {   
        return view('coaches.show', ['coach' => $coach]);
        
    }
}
