<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;

class UsersController extends Controller
{
  /** Register a user
   * @param RegisterRequest $request
   * @return object
   */
  public function register(RegisterRequest $request)
    {
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'gender' => $request->gender,
          'type' => $request->type
        ]);

        return response($user);
    }
}
