@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <h2 class="text-center text-2xl font-bold">Реєстрація</h2>

        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
            @csrf

            <!-- Ім'я -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Ім'я</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Пароль -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" id="password" name="password" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Повторити пароль -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Повторіть пароль</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md">Зареєструватися</button>
        </form>
    </div>
@endsection
