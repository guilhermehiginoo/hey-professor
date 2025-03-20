<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        // quando digo que a function vai retornar uma view, posso passar parâmetros
        // questions é a variável dentro da view, que será acessado dentro de 'dashboard'
        return view('dashboard', [
            'questions' => Question::all(),
        ]);
    }
}
