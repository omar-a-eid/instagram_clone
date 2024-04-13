<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
     

public function handleRegister(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'username' => [
            'required',
            'string',
            Rule::unique('users'), // No need to ignore the current user's ID
        ],
        'email' => 'required|email|max:100',
        'password' => 'required|string|min:6|max:40',
    ]);

    try {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(route('login'));
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->errorInfo[1] === 1062) {
            throw ValidationException::withMessages([
                'username' => 'The username has already been taken.',
            ])->redirectTo(route('register'));
        }

        // Rethrow the exception if it's not related to the unique constraint violation
        throw $e;
    }
}
}