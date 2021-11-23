<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){

        //dd($request);
       // dd($request->get('email'));
        // Validate
        $this->validate($request,[
            'name'=> 'required|max:255',
            'username'=> 'required|max:50',
            'email'=> 'required|email|max:100',
            'password'=> 'required|confirmed',
        ]);
        // add user

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // redirect to
        // sign in user
    }
}
