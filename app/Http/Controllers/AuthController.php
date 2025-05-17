<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Auth;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->type === 'admin') {
                return redirect()->route('admin.blog.index');
            }
            return redirect('/');
        }

        return back()->withErrors([
            'login_error' => 'Invalid credentials',
        ]);
    }


    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:50|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'user',
            ]);

            Auth::login($user);

            event(new UserRegistered($user));

            return redirect('/')->with('success', 'Registration successful.');
        } catch (\Exception $e) {
            return back()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function forgetPassword()
    {
        return view('forget_password');
    }
}
