<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'The provided email does not exist.']);
        }

        if (!$user->is_valid) {
            return redirect()->back()->withErrors(['email' => 'The email address is not validated.']);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'Email or password are not correct.');
        }
         $token = $user->createToken('Personal Access Token')->accessToken;
            Auth::login($user);
            return response()->json(['token' => $token], 200);
    }
    
    

}