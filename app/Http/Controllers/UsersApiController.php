<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\WelcomeMail;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Crypt ;
use Validator;
use Illuminate\Support\Facades\Notification;
use  Illuminate\Notifications\RoutesNotifications;
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
        $password1 = $request->input('conf_password');
        $gender = $request->input('gender');
        $dob = $request->input('date_of_birth');
        $img = $request->input('profile_img');
        
        if ($password === $password1) {
            $pw = Hash::make($password);
        } else {
            return response()->json([
                'message' => 'Password Does not Match With Confirm Password ',
            ], 401);
        }
        $validator = Validator::make($request->all(), 
        [
            'password' => ['required','min:6'],
            'name'=>['required'],
            'email'=>['required ','email','unique:users'],
            'gender'=>['required'],
            'date_of_birth'=>['required ',' date'],
            'profile_img'=>['required'],
        ]);
        //,'mimes:jpeg,jpg'
        if ( $validator->fails() ) 
        {
            return response()->json( [ 'errors' => $validator->errors() ], 400 );
        }        
        else 
        {        
            DB::table('users')->insert(
                [
                    'name' => $name,
                    'password' => $pw,
                    'email' => $email,
                    'gender' => $gender,
                    'date_of_birth' => $dob,
                    'profile_img' => $img,
                     'created_at' => now(),
                     'role' => 'user',
                ]
            );
            $user = DB::table('users')->get()->last();
            //$user->notify(new WelcomeMail($message));
            $message=[
                'greeting'=>'Hello!',
                'body'=>'Welcome to Our Site!'
            ];
            // Notification::send($user , new WelcomeMail($message));
            $user->notify(new WelcomeMail($message));

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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pw = Hash::make($request->input('password'));
        $dbpw = DB::table('users')->where('id', $id)->get('password');
        dd($dbpw, $pw);

        $name = $request->input('name');
        $pw= $request->input('password');
        $npw = $request->input('new_password');
        $cnpw= $request->input('conf_new_password');
        $gender = $request->input('gender');
        $dob = $request->input('date_of_birth');
        $img = $request->input('profile_img');
        
        
        // $validator = Validator::make($request->all(), 
        // [
        //     'password' => ['min:6'],
        //     'date_of_birth'=>['date'],
        //    // 'profile_img'=>['mimes:jpeg,jpg'],
        // ]);
        
        // if ( $validator->fails() ) 
        // {
        //     return response()->json( [ 'errors' => $validator->errors() ], 400 );
        // }   
        // else
        // {       
                $userpassword = Hash::make($pw);
                // $userpassword = crypt::encrypt($pw);
                $oldpassword = DB::table('users')->where('id',$id)->get('password');
                // $oldpassword = crypt::decrypt($beforeoldpassword);
                
                // if($oldpassword === $userpassword)
                
                // if(Hash::check($userpassword, $oldpassword))
                // if($oldpassword == $userpassword)
                // if($oldpassword !== $userpassword)
                //////////////////////////////
                    // $user = DB::table('users')->where('id', $id)->first();
                    // var_dump($user->password);
                    // if($user && password_verify($userpassword, $user->password)) 
                    if($oldpassword !== $userpassword)
                {   
                  
                    if($npw === $cnpw)
                    {
                        $newpassword = Hash::make($npw);
                        // $newpassword = $npw;
                        //= crypt::encrypt($npw);
                        DB::table('users') 
                                ->where('id', $id)
                                ->update([
                                    'name'=>$name,
                                    'password'=>$newpassword,
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
                            'message' => ' Your Password do not  match'
                        ],400);
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

    public function attend_session(request $request)
    {
        $mail = $request->email;
        $todays_conforming_sessions = DB::table('training_sessions')->whereDate('start_at', today())->where('name', $request->input('training_session_name'))->get();
        $remaining_sessions = (array) (DB::table('users')->where('email', $mail)->get('Remaning_session'))[0];

        $validation = Validator::make($request->all(), [
            'training_session_name' => ['required'],
            'email' => ['required'],
            'attendance_time' => ['required'],
            'attendance_date' => ['required'],
            ]);

        $username = $request->input('email');
        $session_name = $request->input('training_session_name');
        $attendance_time = $request->input('attendance_time');
        $attendance_date = today();

        if (!$validation->fails()) {
            if (count($todays_conforming_sessions) > 0) { //is there sessions to be booked today?
                if ($remaining_sessions['Remaning_session'] > 0) { //if there's still sessions available
                    // dd('you have enough remaining sessions');
                    if (count(DB::table('attendance')->whereDate('attendance_date', today())->where('training_session_name', $request->input('training_session_name'))->get()) < count(DB::table('training_sessions')->whereDate('start_at', today())->where('name', $request->input('training_session_name'))->get())) {
                        DB::table('users')->where('email', $mail)->update(['Remaning_session' => $remaining_sessions['Remaning_session'] - 1]);
                        DB::table('attendance')->insert([
                        'username' => $username,
                        'training_session_name' => $session_name,
                        'attendance_time' => $attendance_time,
                        'attendance_date' => $attendance_date,
                        ]);

                        return 'Your session has been booked successfully!';
                    } else {
                        return 'You already attended this session';
                    }
                } else {
                    return 'please buy a package to book sessions';
                }
            } else {
                return "There isn't a conforming session to your requirements today! Please check with our gym manager";
            }
        } else {
            return 'please fill all the required fields';
        }
    }

    public function get_remaining(request $request)
    {
        dd($request->input('email'));
        // return DB::table('users')->where('email', $request->input('email'))->get('Remaning_session');
    }

    /**
     * Create a new AuthController instance.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'store']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        // dd($token);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
