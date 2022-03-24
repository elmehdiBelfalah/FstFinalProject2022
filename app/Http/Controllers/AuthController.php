<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->with('shouldLogin','yes' );
        }
        // Retrive Input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // if success login

            return redirect('/');
        }

        
        // if failed login
        return redirect()->back()->withErrors('User not found please check your email and password')->with('shouldLogin','yes' );
    }
    public function logout(Request $request)
    {
        // Retrive Input
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);


        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->with('shouldRegister','yes' );
        }


        $request->password =  bcrypt($request->password);

        $user = User::create(
            array_merge(
                request(['name', 'email']), 
                ['password' => bcrypt($request->password)]
            )
        );

        auth()->login($user);

        return redirect('/')->withSuccess('User created successfully');
    }
}
