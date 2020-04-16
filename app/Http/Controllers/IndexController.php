<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        if (Session::has('APP_USER')) {
            $user = Session::get('APP_USER');
            return view('user-home', ['user' => $user]);
        }

        return view('guest');
    }
}
