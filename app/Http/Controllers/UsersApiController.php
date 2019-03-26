<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Hash;
use Validator;
class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password1= $request->input('conf_password');
        $gender = $request->input('gender');
        $dob = $request->input('date_of_birth');
        $img = $request->input('profile_img');
        if($password === $password1)
        {
             $pw = Hash::make($password) ;
        } else 
        {
            return response()->json([
                'message' => 'Password Does not Match With Confirm Password '
            ],401);
        }
        $validator = Validator::make($request->all(), 
        [
            'password' => ['required','min:6'],
            'name'=>['required'],
            'email'=>['required ','email','unique:users'],
            'gender'=>['required'],
            'date_of_birth'=>['required ',' date'],
            'profile_img'=>['required','mimes:jpeg,jpg'],
        ]);
        if ( $validator->fails() ) 
        {
            return response()->json( [ 'errors' => $validator->errors() ], 400 );
        }        
        else 
        {        
            DB::table('users')->insert(
                [
                    'name' =>$name,
                    'password' => $pw,
                    'email' => $email,
                    'gender'=>$gender,
                    'date_of_birth'=>$dob,
                    'profile_img'=>$img,
                     'created_at'=> now(),
                     'role'=>'user',
                ]
            );
            return response()->json([
                'message' => 'Your Register is Success , please verify your email.'
            ],201);
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $newpassword1= $request->input('conf_new_password');
        $gender = $request->input('gender');
        $dob = $request->input('date_of_birth');
        $img = $request->input('profile_img');
        $newpassword = $request->input('new_password');
        
        $validator = Validator::make($request->all(), 
        [
            'password' => ['min:6'],
            'date_of_birth'=>['date'],
            'profile_img'=>['mimes:jpeg,jpg'],
        ]);
        
        if ( $validator->fails() ) 
        {
            return response()->json( [ 'errors' => $validator->errors() ], 400 );
        }   
        else
        {
                if($password !== $newpassword)
                {
                    if($newpassword ===  $newpassword1)
                    {
                        $pw = Hash::make($password) ;
                        DB::table('users') 
                        ->where('id', $id)
                        ->update([
                            'name'=>$name,
                            'password'=>$pw,
                            'gender'=>$gender,
                            'date_of_birth'=>$dob,
                            'profile_img'=> $img,
                            'updated_at'=> now(),
                        ]);
                        return response()->json([
                            'message' => 'Your Data Updated Successfully  .'
                        ],200);
                    }
                    else
                    {
                        return response()->json([
                            'message' => 'Password Does not Match With Confirm Password '
                        ],401);
                    }
                }
                else{
                    return response()->json([
                        'message' => ' Your Password Did not Change'
                    ],400);
                }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
