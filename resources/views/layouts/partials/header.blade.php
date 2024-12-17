<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center"
            href="@auth {{ url('http://localhost:5174/') . '?login=true&auth=' . Auth::user()->id }} @else {{ url('http://localhost:5174/?login=false') }} @endauth">
            <img src="{{ asset('storage/BoolBnb.png') }}" alt="BoolBNB Logo" style="height: 50px; margin-right: 15px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.properties.index') }}">Property Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.properties.create') }}">Add Properties</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        transition: background-color 0.3s ease;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: #f8f9fa;
        padding: 0.8rem 1rem;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
        background-color: #0056b3;
        color: #ffffff;
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #0056b3;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggler = document.querySelector('.navbar-toggler');
        toggler.addEventListener('click', () => {
            toggler.classList.toggle('active');
        });
    });
</script>
