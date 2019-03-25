<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gym;
use App\User;
use Yajra\Datatables\Datatables;

class GymsController extends Controller
{
    public function index(){
        return view('gym.index');
    }

    public function get_gymdata(){
        return Datatables::of(Gym::query())->make(true);
    }

    public function create(){
        return view('gym.create');
    }

    public function store(Request $request){
        $data=$request->all();
        $user=Gym::create($data);
        return redirect()->route('gym.index');
    }

    public function edit($gym)
    {
        $gym=Gym::find($gym);
        return view ('gym.edit',[
            'gym'=>$gym,
          ]);
    }

    public function update(Request  $request,Gym $gym )
    {
      $gym->name = request()->all()['name'];
      $gym->created_at = request()->all()['created_at'];
      $gym->save();
        return redirect()->route('gym.index');

    }

      
    public function destroy(Gym $gym)
    {
         $gym->delete();
         return redirect()->route('gym.index');
    } 
}

