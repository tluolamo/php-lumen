<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            //return successful response
            return response()->json($user, 201);

        } catch (\Exception $e) {
            //return error message
            // echo $e;
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

    /**
    * Get a JWT via given credentials.
    *
    * @param  Request  $request
    * @return Response
    */
    public function login(Request $request)
    {
         //validate incoming request
       $this->validate($request, [
           'email' => 'required|string',
           'password' => 'required|string',
       ]);

       $credentials = $request->only(['email', 'password']);

       if (! $token = Auth::attempt($credentials)) {
           return response()->json(['message' => 'Unauthorized'], 401);
       }

       return $this->respondWithToken($token);
    }
}
