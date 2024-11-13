<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $planos = [
            [
                'id' => 1,
                'nome' => 'Plano Básico',
                'mensal' => 29.99,
                'semestral' => 149.99,
                'anual' => 299.99
            ],
            [
                'id' => 2,
                'nome' => 'Plano Pro',
                'mensal' => 49.99,
                'semestral' => 249.99,
                'anual' => 499.99
            ]
        ];

        $user = 'nome';

        $frutas = [
            'banana',
            'maça',
            'uva',
            'laranja',
            'abacaxi'
        ];

        return view('welcome', compact('user', 'frutas', 'planos'));
    }
}
