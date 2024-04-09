<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

     public function create(){
        return view('Auth.register');
    }

    public function store(Request $request){

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
        
        return redirect(route('login'));
    }
}

