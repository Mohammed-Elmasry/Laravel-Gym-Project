<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\City;
use App\Http\Requests\User\StoreUserRequest ;



class CityManagerController extends Controller
{
    public function index(){
        return view('citymanger.index');
    }

    public function create(){
        $Cities = City::all();
        return view('citymanger.create',[
            'Cities' => $Cities,
        ]);
    }

    public function store(StoreUserRequest $request){
        $data=$request->all();
        $user=User::create($data);
        $user->city_id = $data['city_id'];   
        $user->role = 'city_manager';   
        $user->save();
        return redirect()->route('citymanager.index');
    }
}
