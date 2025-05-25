@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Інформація про клієнта</h1>

    <div class="space-y-4">
        <p><strong>Ім'я:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Телефон:</strong> {{ $client->phone }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('clients.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Назад до списку</a>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('clients.edit', $client) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md ml-4">Редагувати</a>
            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4">Видалити</button>
            </form>
        @endif
    </div>
@endsection
