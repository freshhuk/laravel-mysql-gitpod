<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Показати список всіх клієнтів
    public function index()
    {
        $clients = Client::all();  // Отримуємо всіх клієнтів
        return view('clients.index', compact('clients'));  // Повертаємо вигляд з усіма клієнтами
    }

    // Показати форму для додавання нового клієнта
    public function create()
    {
        return view('clients.create');  // Відкриваємо форму для створення клієнта
    }

    // Зберегти нового клієнта
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'nullable',
        ]);

        Client::create($request->all());  // Створюємо нового клієнта
        return redirect()->route('clients.index');  // Переходимо на сторінку списку клієнтів
    }

    // Показати клієнта
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));  // Показуємо деталі клієнта
    }

    // Показати форму для редагування клієнта
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));  // Відкриваємо форму для редагування
    }

    // Оновити інформацію про клієнта
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable',
        ]);

        $client->update($request->all());  // Оновлюємо дані клієнта
        return redirect()->route('clients.index');  // Переходимо на сторінку списку клієнтів
    }

    // Видалити клієнта
    public function destroy(Client $client)
    {
        $client->delete();  // Видаляємо клієнта
        return redirect()->route('clients.index');  // Переходимо на сторінку списку клієнтів
    }
}
