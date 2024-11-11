<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(3);
        // return view('user.index', ['usuarios' => $usuarios]);

        return view('user.index', compact('usuarios'));
    }

    public function show($id)
    {
        return view('user.user')->with('id', $id);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect()->route('admin.dashboard');

    }

}
