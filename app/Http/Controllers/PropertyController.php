<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Конструктор для обмеження доступу
    public function __construct()
    {
        // Тільки адміністратор може редагувати чи видаляти об'єкти
        $this->middleware('role:admin');
    }

    // Показати список всіх об'єктів
    public function index()
    {
        $properties = Property::all();  // Отримуємо всі об'єкти нерухомості
        return view('properties.index', compact('properties'));  // Повертаємо вигляд з об'єктами
    }

    // Показати форму для створення нового об'єкта
    public function create()
    {
        $clients = Client::all();  // Отримуємо всіх клієнтів для прив'язки до об'єкта
        return view('properties.create', compact('clients'));  // Відкриваємо форму для створення
    }

    // Зберегти новий об'єкт в базі даних
    public function store(Request $request)
    {
        // Валідація введених даних
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:активний,в процесі,продано',
            'client_id' => 'required|exists:clients,id',
        ]);

        Property::create($request->all());  // Створюємо новий об'єкт
        return redirect()->route('properties.index');  // Переходимо на сторінку списку об'єктів
    }

    // Показати інформацію про конкретний об'єкт
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));  // Показуємо деталі об'єкта
    }

    // Показати форму для редагування об'єкта
    public function edit(Property $property)
    {
        $clients = Client::all();  // Отримуємо всіх клієнтів для прив'язки до об'єкта
        return view('properties.edit', compact('property', 'clients'));  // Відкриваємо форму для редагування
    }

    // Оновити інформацію про об'єкт
    public function update(Request $request, Property $property)
    {
        // Валідація оновлених даних
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:активний,в процесі,продано',
            'client_id' => 'required|exists:clients,id',
        ]);

        $property->update($request->all());  // Оновлюємо дані об'єкта
        return redirect()->route('properties.index');  // Переходимо на сторінку списку об'єктів
    }

    // Видалити об'єкт
    public function destroy(Property $property)
    {
        $property->delete();  // Видаляємо об'єкт
        return redirect()->route('properties.index');  // Переходимо на сторінку списку об'єктів
    }
}
