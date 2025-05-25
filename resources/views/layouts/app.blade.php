<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM для агентства нерухомості</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Навігаційна панель -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">CRM Агентство</a>
            <div class="flex space-x-4">
                <a href="{{ route('clients.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Клієнти</a>
                <a href="{{ route('properties.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Об'єкти</a>
                <a href="{{ route('notes.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Нотатки</a>

                <!-- Профіль користувача -->
                @auth
                    <div class="relative">
                        <button class="text-white px-3 py-2 rounded-md focus:outline-none">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800">Мій профіль</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-gray-800">Вихід</a>
                        </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Увійти</a>
                    <a href="{{ route('register') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Зареєструватися</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Основний вміст -->
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>
