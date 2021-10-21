<?php

namespace App\Http\Controllers;

use App\Http\Requests\LojaFormRequest;
use App\Models\Loja;
use Illuminate\Http\JsonResponse;

class LojaController extends Controller
{
    public function index()
    {
        return Loja::with('produtos')->get();
    }

    public function show(Loja $loja): Loja
    {
        return $loja;
    }

    public function destroy(Loja $loja): JsonResponse
    {
        $loja->delete();

        return response()->json([
            'message'   => 'Loja removido com sucesso!'
        ], 200);
    }


    public function store(LojaFormRequest $request): JsonResponse
    {
        return response()->json([
            'message'   => 'Loja cadastrado com sucesso!',
            'data'      => Loja::create($request->all())
        ], 201);
    }

    public function update(LojaFormRequest $request, Loja $loja): JsonResponse
    {
        return response()->json([
            'message'   => 'Loja atualizado com sucesso!',
            'data'      => $loja->update($request->all())
        ], 200);
    }
}
