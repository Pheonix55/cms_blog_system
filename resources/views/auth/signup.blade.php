@extends('layouts.auth')
@section('content')
    <div class="form-container">
        <p class="title">Welcome back</p>
        <form class="form" action="{{ route('loginPost') }}" method="POST">
            @csrf
            <input name="name" type="text" class="input" placeholder="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <input name="username" type="text" class="input" placeholder="username" value="{{ old('username') }}">
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <input name="email" type="email" class="input" placeholder="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="input passsword_wrapper">
                <input type="password" id="password" name="password" placeholder="password" class="password"
                    oninput="checkPasswordStrength(this.value)" value="{{ old('password') }}">
                <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></span>
            </div>
            <div id="password-strength" class="password-strength"></div>

            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
            <p class="page-link">
                <span class="page-link-label">Forgot Password?</span>
            </p>
            <button class="form-btn" type="submit">Sign up</button>
        </form>
        <p class="sign-up-label">
            Already have an account?<span class="sign-up-link"><a href="{{ route('loginView') }}">Login</a></span>
        </p>
    </div>
@endsection
