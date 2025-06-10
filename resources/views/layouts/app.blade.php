<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('home') }}" class="text-xl fontව

            font-bold">Конференции</a>
            <div>
                @auth
                    <a href="{{ route('apply.form') }}" class="mr-4">Подать заявку</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login.form') }}" class="mr-4">Войти</a>
                    <a href="{{ route('register.form') }}">Регистрация</a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>