<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\City;
use App\Http\Requests\User\StoreUserRequest ;
use App\Http\Requests\User\UpdateUserRequest ;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;



class CityManagerController extends Controller
{
    public function index(){
        return view('citymanager.index');
    }

    public function get_citymanagerdata(){
        $results = DB::select('select * from users where role = :role', ['role' => 'city_manager']);
        return Datatables::of($results)->make(true);
 
    }

    public function create(){
        $Cities = City::all();
        return view('citymanager.create',[
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


    public function edit($citymanager)
    {
        $citymanager=User::find($citymanager);
        $cities = City::all();
        return view ('citymanager.edit',[
            'citymanager'=>$citymanager,
            'Cities' => $cities,
          ]);
    }

    public function update(UpdateUserRequest  $request,User  $citymanager)
    {
      $citymanager->name = request()->all()['name'];
      $citymanager->email = request()->all()['email'];
      $citymanager->National_id = request()->all()['Nationalid'];
      $citymanager->gender = request()->all()['gender'];
      $citymanager->city_id = request()->all()['city_id'];
      $citymanager->password = request()->all()['password'];
      $citymanager->role = 'city_manager';  
      $citymanager->save();
        return redirect()->route('citymanager.index');

    }

    public function destroy(User $citymanager)
    {
         $citymanager->delete();
         return redirect()->route('citymanager.index');
    }
}
