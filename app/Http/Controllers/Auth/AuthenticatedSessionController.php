<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
   /* public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    /*public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
*/

public function create(){
        return view('Auth.login');
    }

    public function store(Request $request){

        $request->validate([
            'email' =>'required|email|max:100',
            'password' => 'required|string|min:6|max:40',
        ]);
    
      $is_login = auth::attempt(['email'=>$request->email, 'password'=>$request->password]);

      if($is_login){
          return redirect(route('register'));
      }else{
        return back()->withInput()->withErrors(['email','password' => 'Invalid email or password']);
      }
       
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
