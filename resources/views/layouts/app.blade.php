<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body class="bg-blue-500">
    <nav class="flex justify-between p-6 mb-3 bg-white">
        <ul class="flex">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('post') }}" class="p-3">Posts</a>
            </li>
        </ul>

        <ul class="flex">

            @auth
                <li>
                    <a href="{{ route('user.profile', auth()->user()) }}" class="p-3">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline p-3">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            
            @guest
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
            @endguest   
        </ul>
    </nav>

    @yield('content')
</body>
</html>