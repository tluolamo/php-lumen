<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\User;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
          $user = User::findOrFail(Auth::user()['id']);
          $plainPassword = $request->input('password');
          $user->password = app('hash')->make($plainPassword);
          $user->update($request->all());

          return response()->json($user, 200);

        } catch (\Exception $e) {
          //return error message
          // echo $e;
          return response()->json(['message' => 'User update Failed!'], 409);
      }


    }

    public function delete()
    {

        User::findOrFail(Auth::user()['id'])->delete();
        return response(['message' => 'Deleted'], 200);
    }

    // /**
    //  * Get all User.
    //  *
    //  * @return Response
    //  */
    // public function allUsers()
    // {
    //      return response()->json(['users' =>  User::all()], 200);
    // }
    //
    // /**
    //  * Get one user.
    //  *
    //  * @return Response
    //  */
    // public function singleUser($id)
    // {
    //     try {
    //         $user = User::findOrFail($id);
    //
    //         return response()->json(['user' => $user], 200);
    //
    //     } catch (\Exception $e) {
    //
    //         return response()->json(['message' => 'user not found!'], 404);
    //     }
    //
    // }

}
