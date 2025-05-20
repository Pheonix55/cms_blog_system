<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Mail\GeneralEmail;
use App\Models\User;
use Auth;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Mail;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:6',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // at least one lowercase letter
                'regex:/[A-Z]/',      // at least one uppercase letter
                'regex:/[0-9]/',      // at least one numberF
                'regex:/[@$!%*#?&]/', // at least one special character
            ],
        ], [
            'password.regex' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.',
            'password.min' => 'Password must be at least 8 characters.',

        ]);


        if (Auth::attempt(['username' => $validated['username'], 'password' => $validated['password']])) {
            if (Auth::user()->type === 'admin') {
                return redirect()->route('admin.blog.index');
            }
            return redirect('/');
        }

        return back()->withErrors(['login_error' => 'Invalid credentials.'])->withInput();
    }



    public function registerView()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'username' => 'required|string|max:50|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => [
                        'required',
                        'string',
                        'min:8',
                        'regex:/[a-z]/',      // at least one lowercase letter
                        'regex:/[A-Z]/',      // at least one uppercase letter
                        'regex:/[0-9]/',      // at least one numberF
                        'regex:/[@$!%*#?&]/', // at least one special character
                    ],
                ]
                ,
                [
                    'password.regex' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.',
                    'password.min' => 'Password must be at least 8 characters.',

                ]
            );

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
        return redirect()->route('loginView');
    }
    public function forgetPassword()
    {
        return view('auth.forget-password');
    }
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $message = "Click on the link below to reset your password. Thank you!";
            $data = [
                'link' => URL::signedRoute('forget_password', ['id' => $user->id]),
            ];
            Mail::to($user->email)->send(new GeneralEmail('Password Reset Link', $message, $data));
            return back()->with('status', 'Email sent successfully!');
        }

        return back()->withErrors(['email' => 'User not found.']);
    }
    // TODO:: check carefully the flow for forgwt password its untested


    public function newPasswordView($id)
    {
        // dd($id);
        return view('auth.new-password', compact('id'));
    }

    public function newPasswordStore(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'id' => 'required',
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    'min:8',
                    'regex:/[a-z]/',      // at least one lowercase letter
                    'regex:/[A-Z]/',      // at least one uppercase letter
                    'regex:/[0-9]/',      // at least one numberF
                    'regex:/[@$!%*#?&]/', // at least one special character
                ],
            ]
            ,
            [
                'password.regex' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.',
                'password.min' => 'Password must be at least 8 characters.',

            ]
        );
        $user = User::find($request->id);
        if ($user) {
            $user->password = hash::make($request->password);
            return back()->with('success', 'password Updated successfuly');

        }
        return back()->with('error', 'User does not exist');



    }
}

