<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FlutterApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class FlutterApiGet extends Controller
{
    public function index(Request $request)
    {
        $data = new FlutterApiResponse('Flutter Api Get', 'Flutter Api Description', 'API', 'active');

        $data->addItem(['id' => 1, 'name' => 'Item 1', 'price' => 10.5]);
        $data->addItem(['id' => 2, 'name' => 'Item 2', 'price' => 20.0]);

        // dd($data);

        if ($request->wantsJson()) {
            return $data->toJson(); // header application/json
        } else {
            return view('flutter.index', ['data' => $data]); // vwb
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ],
            [
                'firstname.required' => 'Firstname is required.',
                'lastname.required' => 'Lastname is required.',
                'email.required' => 'Email is required.',
                'email.unique' => 'Esse email já existe.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 6 characters.',
            ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $token = $user->createToken('ApiGenerateTokenLaravel')->plainTextToken;

//        dd($token);

        Auth::login($user);

        // Retornar a resposta com o token
        return response()->json([
            'message' => 'Usuário criado e autenticado com sucesso!',
            'data' => [
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
            ],
            'token' => $token,
        ], 201);
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
            [
                'email.required' => 'Email is required.',
                'password.required' => 'Password is required.',
            ]);

        if (Auth::attempt([
            'email' => $request->email, 'password' => $request->password,
        ]))
        {
            $user = Auth::user();
            $token = $user->createToken('ApiGenerateTokenLaravel')->plainTextToken;

            return response()->json([
                'message' => 'Login feito com sucesso',
                'token' => $token,
//                'user' => [
//                    $user->firstname,
//                    $user->lastname,
//                ],
            ], 200);
        }
        return response()->json([
            'message' => 'Login ou senha incorretos.',
        ]);
    }

}
