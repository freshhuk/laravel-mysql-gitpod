@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Об'єкти нерухомості</h1>
    
    @if(auth()->user()->isAdmin())
        <a href="{{ route('properties.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Додати новий об'єкт</a>
    @endif

    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Назва
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Опис
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Статус
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Дії
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($properties as $property)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $property->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $property->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $property->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('properties.show', $property) }}" class="text-indigo-600 hover:text-indigo-900">Переглянути</a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('properties.edit', $property) }}" class="text-indigo-600 hover:text-indigo-900 ml-4">Редагувати</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
