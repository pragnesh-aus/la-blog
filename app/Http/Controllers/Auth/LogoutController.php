<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store(){
        //dd('logout');
        auth()->logout();

        //redirect to home page
        return redirect()->route('home');
    }
}
