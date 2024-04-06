<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function register(){
        return view('users.register');
    }

    public function handleRegister(Request $request){

    $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string',
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6|max:40',
    ]);

    
        $user=User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash:: make ($request->password),
        ]);
    
        Auth::login($user);
        
        return redirect(route('users.login'));
    }
}
