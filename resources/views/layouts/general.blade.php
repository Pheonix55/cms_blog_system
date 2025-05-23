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
    <link rel="stylesheet" href="/partials/mega_menu.css">

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
            background: #000;
            box-shadow: 6px 1px 6px 1px #fff;
            position: fixed;
            z-index: 1000;

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
            color: #fff;
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
            background-color: #fff;
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

    <div class="navbar_general">
        <nav class="navbar_nav">
            <ul class="custom_navbar">
                <li class="custom_nav_item"><a class="cutom_nav_link" href="#">Home</a></li>
                <li class="custom_nav_item" id="meqa_menu_trigger"><a class="cutom_nav_link"
                        href="#">Categories</a>

                </li>
                <li class="custom_nav_item"><a class="cutom_nav_link" href="#">about us</a></li>
                @auth
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="#">My blogs</a></li>
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="#">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="custom_nav_item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="cutom_nav_link" href="{{ route('logout') }}">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="#">Guest</a></li>
                    <li class="custom_nav_item"><a class="cutom_nav_link" href="{{ route('loginView') }}">SignIn</a></li>
                @endguest

            </ul>
        </nav>
    </div>
    <div class="mega_menu">
        <div class="top_tabs">
            <div class="tabs">
                <div class="tab_item" data-content="tab-content-1">App</div>
                <div class="tab_item" data-content="tab-content-2">Suites</div>
                <div class="tab_item" data-content="tab-content-3">coworkit </div>
                <div class="tab_item" data-content="tab-content-4">Marketplace</div>
                <div class="explore-link">
                    <a href="#">Explore all products</a>
                </div>
            </div>

            <div class="close_btn">
                X
            </div>
        </div>
        <hr>
        <div class="bottom_section">
            <div class="tab_content" id="tab-content-1">
                <div class="left_side_menu">
                    <ul class="side_menu_tabs">
                        <li class="side_menu_item" data-content="subtab_content-1">Sales</li>
                        <li class="side_menu_item" data-content="subtab_content-2">Marketing
                        </li>
                        <li class="side_menu_item" data-content="subtab_content-3">Commercial
                        </li>
                        <li class="side_menu_item" data-content="subtab_content-4">POS</li>
                    </ul>
                </div>
                <div class="right_side_tab_menu_content">
                    <div class="sub_tabs_content" id="subtab_content-1">
                        <h1>Sales</h1>
                        <div class="subtab_container">
                            <a href="/product/product1.html">
                                <div class="subtab_item">
                                    <div class="subtab_item_upper">
                                        <img src="img/crm.gif" alt=""><span>CRM</span>
                                    </div>
                                    <div class="subtab_item_para">
                                        Comprehensive CRM systeme
                                    </div>

                                </div>
                            </a>
                            <div class="subtab_item">
                                <div class="subtab_item_upper">
                                    <img src="img/icon1.png" alt=""><span>CRM</span>
                                </div>
                                <div class="subtab_item_para">
                                    Comprehensive CRM systeme
                                </div>

                            </div>
                            <div class="subtab_item">
                                <div class="subtab_item_upper">
                                    <img src="img/icon1.png" alt=""><span>CRM</span>
                                </div>
                                <div class="subtab_item_para">
                                    Comprehensive CRM systeme
                                </div>

                            </div>
                            <div class="subtab_item">
                                <div class="subtab_item_upper">
                                    <img src="img/icon1.png" alt=""><span>CRM</span>
                                </div>
                                <div class="subtab_item_para">
                                    Comprehensive CRM systeme
                                </div>

                            </div>
                            <div class="subtab_item">
                                <div class="subtab_item_upper">
                                    <img src="img/icon1.png" alt=""><span>CRM</span>
                                </div>
                                <div class="subtab_item_para">
                                    Comprehensive CRM systeme
                                </div>

                            </div>
                            <div class="subtab_item">
                                <div class="subtab_item_upper">
                                    <img src="img/icon1.png" alt=""><span>CRM</span>
                                </div>
                                <div class="subtab_item_para">
                                    Comprehensive CRM systeme
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="sub_tabs_content" id="subtab_content-2">
                        <h1>Marketing</h1>
                    </div>
                    <div class="sub_tabs_content" id="subtab_content-3">
                        <h1>commercial</h1>
                    </div>
                    <div class="sub_tabs_content" id="subtab_content-4">
                        <h1>POS</h1>
                    </div>

                </div>
            </div>
            <div class="tab_content" id="tab-content-2">
                <h1>Tab content-2</h1>
            </div>
            <div class="tab_content" id="tab-content-3">
                <h1>Tab content-3</h1>
            </div>
            <div class="tab_content" id="tab-content-4">
                <h1>Tab content-4</h1>
            </div>
        </div>
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
    {{-- <script>
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
    </script> --}}


    <script src="/partials/mega_menu.js"></script>
</body>

</html>
