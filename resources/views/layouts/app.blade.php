<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Motors') | MotorSite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="logo">MotorSite</a>
        <nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('motors.index') }}" class="{{ request()->routeIs('motors.*') ? 'active' : '' }}">Motors</a>
            <a href="{{ route('soorten') }}" class="{{ request()->routeIs('soorten') ? 'active' : '' }}">Soorten</a>
            <a href="{{ route('merken') }}" class="{{ request()->routeIs('merken') ? 'active' : '' }}">Merken</a>
            <a href="{{ route('onderhoud') }}" class="{{ request()->routeIs('onderhoud') ? 'active' : '' }}">Onderhoud</a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">Admin</a>
                @else
                    <a href="{{ route('testrides.index') }}" class="{{ request()->routeIs('testrides.*') ? 'active' : '' }}">Mijn aanvragen</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-logout">Uitloggen</button>
                </form>
            @else
                <a href="{{ route('login') }}">Inloggen</a>
                <a href="{{ route('register') }}" class="btn-nav">Registreren</a>
            @endauth
        </nav>
    </div>
</header>

<main class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
    @yield('content')
</main>

<footer>
    <div class="container">
        <p>&copy; {{ date('Y') }} MotorSite &mdash; Alle rechten voorbehouden.</p>
    </div>
</footer>

</body>
</html>
