<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('storage/BoolBnb.png') }}" alt="BoolBNB Logo" style="height: 60px; margin-right: 20px;">
            <span class="fw-bold text-primary">BoolBNB</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                @guest
                @else
                    <li class="nav-item">
                        <a class="nav-link text-dark hover-text-primary" href="{{ route('admin.properties.index') }}">{{ __('Properties') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark hover-text-primary" href="{{ route('admin.properties.create') }}">{{ __('Add New Property') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark hover-text-primary" href="{{ route('admin.messages.index') }}">{{ __('Received Messages') }}</a>
                    </li>
                @endguest
            </ul>

            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark hover-text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark hover-text-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark hover-text-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>

        .navbar {
        background-color: #007bff;
        border-bottom: 1px solid #e0e0e0;
        transition: background-color 0.3s ease;
    }


    .navbar:hover {
        background-color: #0056b3;
    }


    .navbar-nav .nav-link {
        font-weight: 500;
        padding: 12px 18px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }


    .navbar-nav .nav-link:hover {
        color: #f8f9fa;
        text-decoration: none;
        transform: scale(1.1);
        box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
        background-color: #0056b3;
    }


    .navbar-toggler-icon {
        background-color: #f8f9fa;
    }


    .navbar-brand img {
        transition: transform 0.3s ease;
    }

    .navbar-brand img:hover {
        transform: scale(1.1);
    }


    .navbar-brand:hover {
        color: #f8f9fa;
        transition: color 0.3s ease;
    }


    .dropdown-menu {
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
    }

    .dropdown-item {
        color: #333;
        padding: 12px 20px;
        border-radius: 5px;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .dropdown-item:hover {
        color: #007bff;
        background-color: #f1f1f1;
    }


    .navbar-collapse {
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    .dropdown-item.logout {
        background-color: #dc3545;
        color: #fff;
        transition: all 0.3s ease;
    }

    .dropdown-item.logout:hover {
        background-color: #c82333;
        color: #f8f9fa;
    }


    .nav-link:focus, .dropdown-item:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
        transform: scale(1.05);
    }

</style>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.querySelector('.navbar');
        const navbarToggler = document.querySelector('.navbar-toggler');

        navbarToggler.addEventListener('click', function() {
            navbar.classList.toggle('shadow-lg');
        });


        const dropdownMenu = document.querySelector('.dropdown-menu');
        if (dropdownMenu) {
            dropdownMenu.addEventListener('transitionend', function() {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.style.opacity = 1;
                }
            });
        }


        const logo = document.querySelector('.navbar-brand img');
        logo.classList.add('animate__animated', 'animate__bounceIn');
    });
</script>
