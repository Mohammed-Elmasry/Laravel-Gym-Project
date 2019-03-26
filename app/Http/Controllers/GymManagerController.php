<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Gym;
use App\Http\Requests\User\StoreUserRequest ;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;




class GymManagerController extends Controller
{
    public function index(){
        return view('gymmanger.index');
    }

    public function get_gymmanagerdata(){
        $results = DB::select('select * from users where role = :role', ['role' => 'gym_manager']);
        return Datatables::of($results)->make(true);
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
        $user->gender = $data['gender'];
        $user->National_id = $data['Nationalid'];
        $user->gym_id = $data['gym_id'];
        $user->role = 'gym_manager';    
        $user->save();
        return redirect()->route('gymmanger.index');
    }

    public function edit($gymmanager)
    {
        $gymmanager=User::find($gymmanager);
        $Gyms = Gym::all();
        return view ('gymmanger.edit',[
            'gymmanager'=>$gymmanager,
            'Gyms' => $Gyms,
          ]);
    }

    public function destroy(User $gymmanager)
    {
         $gymmanager->delete();
         return redirect()->route('gymmanger.index');
    } 
}
