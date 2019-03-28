<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
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
        $validator = Validator::make(
            $request->all(),
            [
            'password' => ['required', 'min:6'],
            'name' => ['required'],
            'email' => ['required ', 'email', 'unique:users'],
            'gender' => ['required'],
            'date_of_birth' => ['required ', ' date'],
            'profile_img' => ['required'],
        ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
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

            return response()->json([
                'message' => 'Your Register is Success , please verify your email.',
            ], 201);
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
        $password = $request->input('password');
        $newpassword1 = $request->input('conf_new_password');
        $gender = $request->input('gender');
        $dob = $request->input('date_of_birth');
        $img = $request->input('profile_img');
        $newpassword = $request->input('new_password');

        $validator = Validator::make(
            $request->all(),
            [
            'password' => ['min:6'],
            'date_of_birth' => ['date'],
            'profile_img' => ['mimes:jpeg,jpg'],
        ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            if ($password !== $newpassword) {
                if ($newpassword === $newpassword1) {
                    $pw = Hash::make($password);
                    DB::table('users')
                        ->where('id', $id)
                        ->update([
                            'name' => $name,
                            'password' => $pw,
                            'gender' => $gender,
                            'date_of_birth' => $dob,
                            'profile_img' => $img,
                            'updated_at' => now(),
                        ]);

                    return response()->json([
                            'message' => 'Your Data Updated Successfully  .',
                        ], 200);
                } else {
                    return response()->json([
                            'message' => 'Password Does not Match With Confirm Password ',
                        ], 401);
                }
            } else {
                return response()->json([
                        'message' => ' Your Password Did not Change',
                    ], 400);
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

    public function attend_session(request $request, $id)
    {
        // dd($request->username);
        $remaining_sessions = DB::table('users')->where('email', $request->username)->get('Remaning_session');
        dd($remaining_sessions);
        if ($remaining_sessions > 0) {
            return 'you can book a session';
            DB::table('users')->where('email', $request->username) - update([
                'Remaing_session' => $remaining_sessions - 1,
            ]);
        } else {
            return 'please buy a package to book sessions';
        }

        $username = $request->input('username');
        $session_name = $request->input('session_name');
        $attendance_time = $request->input('attendance_time');
        $attendance_date = $request->input('attendance_date');

        DB::table('attendance')->insert([
            'username' => $username,
            'training_session_name' => $session_name,
            'attendance_time' => $attendance_time,
            'attendance_date' => $attendance_date,
            ]);
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
