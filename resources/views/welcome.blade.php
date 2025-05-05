<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome to CMS blog System</title>
    <link rel="stylesheet" href="/blog_cards.css">
    <link rel="stylesheet" href="/navbar.css">
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
                    <li><a href="#">About</a></li>
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
                    <li><a href="#">Feedback</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">logout</a>
                        </form>
                    </li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>


    </div>
    <div class="blog_cards">
        <div class="container">
            <div class="card">
                <div class="card__header">
                    <img src="{{ asset('images/tech.jpeg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-blue">Technology</span>
                    <h4>What's new in 2022 Tech</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>Jane Doe</h5>
                            <small>2h ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__header">
                    <img src="{{ asset('images/food.jpg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-brown">Food</span>
                    <h4>Delicious Food</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=2" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>Jony Doe</h5>
                            <small>Yesterday</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__header">
                    <img src="{{ asset('images/raace.jpg') }}" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-red">Automobile</span>
                    <h4>Race to your heart content</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo
                        doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <img src="https://i.pravatar.cc/40?img=3" alt="user__image" class="user__image">
                        <div class="user__info">
                            <h5>John Doe</h5>
                            <small>2d ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
