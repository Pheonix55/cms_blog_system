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
    <link rel="stylesheet" href="/partials/loader.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        a {
            color: black;
            text-decoration: none;
        }

        .navbar_general {
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            background: #FFF;
            box-shadow: 6px 1px 6px 1px #fff;

        }

        .navbar_general .navbar_nav {
            width: 100vw;
        }

        .navbar_general .navbar_nav .custom_navbar {
            padding-block: 10px;
            display: flex;
            justify-items: center;
            justify-content: center;
            list-style-type: none;
            width: 100%;
            gap: 3rem;
        }

        .navbar_general .navbar_nav .custom_navbar .custom_nav_item a {
            color: #8293dd;
            position: relative;
        }

        .cutom_nav_link::after {
            content: "";
            position: relative;
            display: block;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: #26ADE3;
            transition: width 0.3s ease-in-out;
        }

        .cutom_nav_link:hover {
            cursor: pointer;
        }

        .cutom_nav_link:hover::after,
        .cutom_nav_link.active::after {
            width: 100%;
        }

        button {
            border: none;
            outline: none;
            background: none;
        }
    </style>
</head>

<body>
    {{-- <h1>welcome</h1>
    <h2>{{ Auth::user()->name }}</h2> --}}
    <div class="navbar_general">
        <nav class="navbar_nav">
            <ul class="custom_navbar">
                <li class="custom_nav_item"><a class="cutom_nav_link" href="#">Home</a></li>
                <li class="custom_nav_item"><a class="cutom_nav_link" href="#">Categories</a></li>
                <li class="custom_nav_item"><a class="cutom_nav_link" href="#">about us</a></li>
                @auth
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="#">My blogs</a></li>
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="#">{{ Auth::user()->name }}</a></li>
                @endauth
                @guest
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="#">Guest</a></li>
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="{{ route('loginView') }}">SignIn</a></li>
                @endguest
                @auth
                    <li class="custom_nav_item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="cutom_nav_link" href="{{ route('logout') }}">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
    <!-- Loader Overlay -->
    <div id="global-loader"
        style="display: none;
position: fixed; top: 0; left: 0;
width: 100vw; height: 100vh;
background-color: rgba(255, 255, 255, 0.7);
z-index: 9999; display: flex; align-items: center; justify-content: center;">
        <div class="loader"></div>
    </div>

    <div class="main" style="margin-top: 100px">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('global-loader');
            const forms = document.querySelectorAll('form');

            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    loader.style.display = 'flex';
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const maxLength = 200;


            const cards = document.querySelectorAll('.blog_card_12');

            cards.forEach(card => {
                const paragraph = card.querySelector('.card-text'); // Select paragraph inside card
                const dots = card.querySelector('.dots'); // Select corresponding dots

                const fullText = paragraph.innerText; // Store the full text
                const truncatedText = fullText.substring(0, maxLength); // Truncated version of the text

                if (fullText.length > maxLength) {
                    paragraph.innerText = truncatedText; // Truncate text
                    dots.innerText = "... Show more"; // Set initial text for dots
                    dots.style.display = 'inline'; // Show the dots
                } else {
                    dots.style.display = 'none'; // Hide dots if text is short
                }

                // Add click event to dots for toggling text
                dots.addEventListener('click', function() {
                    if (dots.innerText === "... Show more") {
                        paragraph.innerText = fullText; // Show full text
                        dots.innerText = "Show less"; // Change to "Show less"
                    } else {
                        paragraph.innerText = truncatedText; // Show truncated text
                        dots.innerText = "... Show more"; // Change back to "Show more"
                    }
                });
            });
        });
    </script>

</body>

</html>
