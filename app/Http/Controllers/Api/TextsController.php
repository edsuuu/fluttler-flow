<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Texts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TextsController extends Controller
{

    public function index()
    {
        $texts = Texts::all()->map(function ($text) {
            return [
                'id' => $text->id,
                'name' => $text->name,
                'created_at' => Carbon::parse($text->created_at)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::parse($text->updated_at)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
            ];
        });

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
