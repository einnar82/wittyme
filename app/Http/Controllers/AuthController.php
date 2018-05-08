<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use JWTFactory, JWTAuth;
class AuthController extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware('jwt.auth');  
    // }

    public function login(LoginRequest $request)
    {
      $credentials = $request->only('email', 'password');
      if (!$token = JWTAuth::attempt($credentials)) {
        return response(['error' => 'Invalid Username or Password!'], 404);
      }
      return response(['token' => $token], 200);
    }
}
