<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome to CMS blog System</title>
    <link rel="stylesheet" href="/blog_cards.css">
    <link rel="stylesheet" href="/navbar.css">
    <link rel="stylesheet" href="/serachbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    {{-- <h1>welcome</h1>
    <h2>{{ Auth::user()->name }}</h2> --}}
    <div class="nav_navbar">
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="#">Logo</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ url('/blog') }}">blogs</a></li>
                    <li>
                        <a href="#" class="desktop-item">Dropdown Menu</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Dropdown Menu</label>
                        <ul class="drop-menu">
                            <li><a href="#">Drop menu 1</a></li>
                            <li><a href="#">Drop menu 2</a></li>
                            <li><a href="#">Drop menu 3</a></li>
                            <li><a href="#">Drop menu 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="desktop-item">Mega Menu</a>
                        <input type="checkbox" id="showMega">
                        <label for="showMega" class="mobile-item">Mega Menu</label>
                        <div class="mega-box">
                            <div class="content">
                                <div class="row">
                                    <img src="https://fadzrinmadu.github.io/hosted-assets/responsive-mega-menu-and-dropdown-menu-using-only-html-and-css/img.jpg"
                                        alt="">
                                </div>
                                <div class="row">
                                    <header>Design Services</header>
                                    <ul class="mega-links">
                                        <li><a href="#">Graphics</a></li>
                                        <li><a href="#">Vectors</a></li>
                                        <li><a href="#">Business cards</a></li>
                                        <li><a href="#">Custom logo</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Email Services</header>
                                    <ul class="mega-links">
                                        <li><a href="#">Personal Email</a></li>
                                        <li><a href="#">Business Email</a></li>
                                        <li><a href="#">Mobile Email</a></li>
                                        <li><a href="#">Web Marketing</a></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <header>Security services</header>
                                    <ul class="mega-links">
                                        <li><a href="#">Site Seal</a></li>
                                        <li><a href="#">VPS Hosting</a></li>
                                        <li><a href="#">Privacy Seal</a></li>
                                        <li><a href="#">Website design</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    @auth
                        <li><a href="#">{{ Auth()->user()->name }}</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">logout</a>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endguest
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>


    </div>
    <div class="main" style="margin-top: 100px">
        @yield('content')
    </div>


</body>

</html>
