@extends('layouts.auth')
@section('content')
    <div class="form-container">
        <div class="header_form_auth">
            <p class="title">Choose a new password</p>
            <span class="tooltip-container">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50">
                        <path
                            d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22c-5.518 0-10-4.482-10-10s4.482-10 10-10 10 4.482 10 10-4.482 10-10 10zm-1-16h2v6h-2zm0 8h2v2h-2z">
                        </path>
                    </svg>
                </div>
                <div class="tooltip">
                    <p>Password must contain at least </p>
                    <ul>
                        <li>1 uppercase letter</li>
                        <li>1 lowercase letter</li>
                        <li>1 number </li>
                        <li>1 special
                            character</li>
                    </ul>
                </div>
            </span>
        </div>
        <form class="form" action="{{ route('new_password', ['id' => $id]) }}" method="POST">
            @if ($errors->any())
                <div class="form-alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @csrf
            <div class="input passsword_wrapper">
                <input type="password" id="password" name="password" placeholder="password" class="password"
                    oninput="checkPasswordStrength(this.value)" value="{{ old('password') }}">
                <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
            </div>
            <div id="password-strength" class="password-strength"></div>
            <div class="passsword_wrapper input">
                <input id="confirm_pass" type="password" class="password" name="password_confirmation"
                    placeholder="confirm new password">
                <div id="password-match-status" style="margin-top: 5px; font-size: 14px;"></div>

            </div>

            <input type="text" class="hiiden-input" name="id" value="{{ $id }}" hidden>
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror

            <button class="form-btn" type="submit">Confirm</button>
            <p class="sign-up-label">
                try your new password<span class="sign-up-link"><a href="{{ route('loginView') }}">Sign In</a></span>
            </p>
        </form>

    </div>
@endsection
