<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav.ml-auto .nav-link {
            margin-right: 15px;
        }

        .top-section {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
        }

        .centered-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .card-section {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

        .card {
            width: 300px;
            margin: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route("home") }}">Evento</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="home">Home</a>
            </li>

            @auth
                @if(auth()->user()->role == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">User Dashboard</a>
                    </li>
                @elseif(auth()->user()->role == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Organizer Dashboard</a>
                    </li>
                @elseif(auth()->user()->role == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    </li>
                @endif
            @endauth
            <li class="nav-item">
                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mx-2">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('signup') }}" class="nav-link">Signup</a>
                @endauth
            </li>
        </ul>
    </div>
</nav>

<div class="top-section">
    <img class="background-image" src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Background Image">
    <div class="overlay"></div>
    <div class="centered-content">
        <h2>Discover Useful Events with Evento</h2>
        <p>Your go-to platform for discovering and participating in a diverse range of impactful science and technology events.</p>
    </div>
</div>

<div class="container">
    <div class="card-section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upcoming Events</h5>
                <p class="card-text">Explore our schedule of exciting science and technology events.</p>
                <a href="{{ route("home") }}" class="btn btn-primary">View Events</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Attendees and Participants</h5>
                <p class="card-text">Join our community of enthusiasts, researchers, and innovators.</p>
                <a href="{{ route("home") }}" class="btn btn-primary">Join Community</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Speakers and Presenters</h5>
                <p class="card-text">Become one of our distinguished speakers or presenters.</p>
                <a href="{{ route("home") }}" class="btn btn-primary">Apply to Speak</a>
            </div>
        </div>
    </div>
</div>



<footer class="bg-dark text-light py-4">
    <div class="container text-center">
        <p>&copy; 2024 Evento. All rights reserved.</p>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
