<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Gym;
use App\Http\Requests\User\StoreUserRequest ;



class GymManagerController extends Controller
{
    public function index(){
        return view('gymmanger.index');
    }

    public function create(){
        $Gyms = Gym::all();
        return view('gymmanger.create',[
            'Gyms' => $Gyms,
        ]);
    }

    public function store(StoreUserRequest $request){
        $data=$request->all();
        $user=User::create($data);
        $user->gym_id = $data['gym_id'];
        $user->role = 'gym_manager';    
        $user->save();
        return redirect()->route('gymmanager.index');
    }
}
