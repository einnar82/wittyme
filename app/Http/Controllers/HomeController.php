<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
      return view('user.home');
    }

    public function admin()
    {
      return view('user.admin');
    }
}
