<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="/partials/loader.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/blog/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 56px;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .post-image {
            max-width: 100%;
            height: auto;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name', 'LaraBlog') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Blog</a>
                    </li>
                </ul>

                <!-- Right-aligned auth links -->
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('posts.create') }}">New Post</a></li>
                                <li><a class="dropdown-item" href="{{ route('posts.index') }}">My Posts</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registerPost') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    {{-- side-bar --}}
    <nav class="sidebar">
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="#" class="navbar__link"><i class="fa-solid fa-house-chimney"></i><span>Home</span></a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link"><i class="fa-solid fa-users"></i><span>Users</span></a>
            </li>
            <li class="navbar__item">
                <a href="{{ url('/categories') }}" class="navbar__link"><i
                        class="fa-solid fa-layer-group"></i><span>Categories</span></a>
            </li>
            <li class="navbar__item">
                <a href="{{ url('/tags') }}" class="navbar__link"><i
                        class="fa-solid fa-tags"></i><span>Tags</span></a>
            </li>

            <li class="navbar__item">
                <a href="#" class="navbar__link"><i class="fa-solid fa-info"></i><span>Help</span></a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
            </li>
        </ul>
    </nav>
    <!-- Main Content -->
    <main class="container py-4">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Loader Overlay -->
        <div id="global-loader"
            style="display: none;
     position: fixed; top: 0; left: 0;
     width: 100vw; height: 100vh;
     background-color: rgba(255, 255, 255, 0.7);
     z-index: 9999; display: flex; align-items: center; justify-content: center;">
            <div class="loader"></div>
        </div>

        <!-- Page Content -->
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'LaraBlog') }}. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.navbar__link').hover(
                function() {
                    $(this).find('i').addClass('sidebar_nav_item_active');
                },
                function() {
                    $(this).find('i').removeClass('sidebar_nav_item_active');
                }
            );
        });
    </script>
    <!-- Custom Scripts -->
    @stack('scripts')
</body>

</html>
