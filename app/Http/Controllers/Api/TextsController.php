<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Texts;
use Illuminate\Http\Request;

class TextsController extends Controller
{

    public function index()
    {
        $texts = Texts::all();

        return response()->json([
            'message' => 'Todos os textos retornados com sucesso.',
            'data' => $texts,
        ], 200);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ],
            [
                'name' => 'Nome é requerido',
            ]);

        $text = Texts::create($validate);

        return response()->json([
            'message' => 'Texto criado com sucesso ',
            'data' =>  [
                'id' => $text->id,
                'name' => $text->name,
            ],
        ], 201);
    }

}
