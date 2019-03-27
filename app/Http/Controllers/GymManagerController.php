<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Gym;
use App\Http\Requests\User\StoreUserRequest ;
use App\Http\Requests\User\UpdateUserRequest ;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;




class GymManagerController extends Controller
{
    public function index(){
        return view('gymmanager.index');
    }

    public function get_gymmanagerdata(){
        $results = DB::select('select * from users where role = :role', ['role' => 'gym_manager']);
        return Datatables::of($results)->make(true);
    }

    public function create(){
        $Gyms = Gym::all();
        return view('gymmanager.create',[
            'Gyms' => $Gyms,
        ]);
    }

    public function store(StoreUserRequest $request){
        $data=$request->all();
        $user=User::create($data);
        $user->gender = $data['gender'];
        $user->National_id = $data['Nationalid'];
        $user->gym_id = $data['gym_id'];
        $user->role = 'gym_manager';    
        $user->save();
        return redirect()->route('gymmanager.index');
        
    }

    public function edit($gymmanager)
    {
        $gymmanager=User::find($gymmanager);
        $Gyms = Gym::all();
        return view ('gymmanager.edit',[
            'gymmanager'=>$gymmanager,
            'Gyms' => $Gyms,
          ]);
    }

    public function update(UpdateUserRequest  $request,User  $gymmanager)
    {
      $gymmanager->name = request()->all()['name'];
      $gymmanager->email = request()->all()['email'];
      $gymmanager->National_id = request()->all()['Nationalid'];
      $gymmanager->gender = request()->all()['gender'];
      $gymmanager->gym_id = request()->all()['gym_id'];
      $gymmanager->password = request()->all()['password'];
      $gymmanager->role = 'gym_manager';  
      $gymmanager->save();
        return redirect()->route('gymmanager.index');

    }

    public function destroy(User $gymmanager)
    {
         $gymmanager->delete();
         return redirect()->route('gymmanager.index');
    } 
}

