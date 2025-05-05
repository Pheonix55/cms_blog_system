<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forget password</title>
</head>

<body>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <h2>Forgot Password</h2>

        @if (session('status'))
            <div class="success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
        <button type="submit">Send Password Reset Link</button>
    </form>

</body>

</html>
