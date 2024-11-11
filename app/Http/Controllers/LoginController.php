<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function auth(Request $request): \Illuminate\Http\RedirectResponse
    {

        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O email é inválido.',
                'password.required' => 'O campo senha é obrigatório.',
            ]
        );

        if (Auth::attempt($credentials)) {
            // dd($credentials);

            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        } else {
            return back()->with('erro', 'Email ou senha invalida');
        }
    }

    public function loggout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function create()
    {
        return view('register.cadastro');
    }

}

