<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign up / Login Form</title>
    <link rel="stylesheet" href="auth.css">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        {{-- <div class="signup">
                <form action="{{ route('registerPost') }}" method="POST">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="name" placeholder="name" required="">
                    <input type="text" name="username" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button type="submit">Sign up</button>
                </form>
            </div> --}}
        <div class="signup">
            <form action="{{ route('registerPost') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="auth_row">
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                </div>
                <div class="auth_row">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form action="{{ route('loginPost') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>

                @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="text" name="username" placeholder="User name" value="{{ old('username') }}" required>
                <input type="password" name="password" placeholder="Password" required>

                <a href="{{ route('forget_password') }}">forget password?</a>
                <button type="submit">Login</button>
            </form>
        </div>

    </div>
    </div>
</body>

</html>
<!-- partial -->

</body>

</html>
