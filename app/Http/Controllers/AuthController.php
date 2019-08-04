<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
      $this->validate($request,[
        'username' => 'required|unique:users',
        'email'    => 'required|unique:users',
        'password' => 'required',
      ]);

      return User::create([
        'username' => $request->json('username'),
        'email'    => $request->json('email'),
        'password' => bcrypt($request->json('password')),
      ]);
    }

    public function signin(Request $request)
    {
      $this->validate($request,[
        'username' => 'required', 'password' => 'required',
      ]);

      // grab credentials from the request
      $credentials = $request->only('username', 'password');

      try {
          // attempt to verify the credentials and create a token for the user
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 401);
          }
      } catch (JWTException $e) {
          // something went wrong whilst attempting to encode the token
          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      // all good so return the token
      return response()->json(compact('token'));
    }
}
