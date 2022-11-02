<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(Request $request){
        $credentials = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|unique:users,email',
            'password' => 'string|required|confirmed'
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $request->session()->put('auth_token', $token);

        return response(['token' => $token, 'user' => $user]);
    }
    
    function login(Request $request){
        $credentials = $request->validate([
            'email' => 'string|required',
            'password' => 'string|required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return response(['error' => 'Wrong credentials! Please try again.']);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $request->session()->put('auth_token', $token);

        return response(['token' => $token, 'user' => $user]);
    }

    function logout(Request $request){
        Auth::user()->tokens()->delete();

        return response(['success' => 'You have been logged out!']);
    }

    function get_token(Request $request){
        return response(['token' => $request->session()->get('auth_token')]);
    }
}
