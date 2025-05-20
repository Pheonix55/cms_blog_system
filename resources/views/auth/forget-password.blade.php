@extends('layouts.auth')
@section('content')
    <div class="form-container">
        <p class="title">Forgot your Password</p><span> Dont worry we are here to help</span>
        <form class="form" action="{{ route('send_reset_link') }}" method="POST">
            @if ($errors->any())
                <div class="form-alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @csrf
            <input type="email" class="input" name="email" placeholder="email" value="{{ old('email') }}">
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
            <button class="form-btn" type="submit">Send Password reset link</button>
            <p class="sign-up-label">
                wanna give it one more shot<span class="sign-up-link"><a href="{{ route('loginView') }}">Sign In</a></span>
            </p>
        </form>

    </div>
@endsection
