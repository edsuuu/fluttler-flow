<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $user = 'nome';

        $frutas = [
            'banana',
            'maça',
            'uva',
            'laranja',
            'abacaxi'
        ];

        return view('welcome', compact('user', 'frutas'));
    }
}
