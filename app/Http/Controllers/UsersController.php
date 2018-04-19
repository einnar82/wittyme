<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;

class UsersController extends Controller
{
    public function register(RegisterRequest $request)
    {
        User::create([

        ]);
    }
}
