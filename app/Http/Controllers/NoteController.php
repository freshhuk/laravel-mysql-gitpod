<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Property;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Конструктор для обмеження доступу
    public function __construct()
    {
        // Адміністратор може бачити всі нотатки, а менеджер лише свої
        $this->middleware('role:admin')->only('index');  // Адміністратор бачить всі нотатки
    }

    // Показати всі нотатки
    public function index()
    {
        $user = auth()->user();

        // Адмін бачить всі нотатки, менеджер тільки свої
        if ($user->isAdmin()) {
            $notes = Note::all();
        } else {
            $notes = Note::where('user_id', $user->id)->get();
        }

        return view('notes.index', compact('notes'));  // Повертаємо вигляд з нотатками
    }

    // Показати форму для створення нової нотатки
    public function create(Property $property)
    {
        return view('notes.create', compact('property'));  // Відкриваємо форму для додавання нотатки
    }

    // Зберегти нову нотатку
    public function store(Request $request, Property $property)
    {
        // Валідація введених даних
        $request->validate([
            'content' => 'required',
        ]);

        // Створюємо нову нотатку
        $note = new Note();
        $note->content = $request->content;
        $note->property_id = $property->id;
        $note->user_id = auth()->id();  // Вказуємо користувача, який додає нотатку
        $note->save();

        return redirect()->route('properties.show', $property);  // Переходимо до перегляду об'єкта
    }

    // Видалити нотатку
    public function destroy(Note $note)
    {
        $note->delete();  // Видаляємо нотатку
        return redirect()->route('notes.index');  // Переходимо до списку нотаток
    }
}
