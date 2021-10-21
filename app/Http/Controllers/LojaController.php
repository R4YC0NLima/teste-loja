<?php

namespace App\Http\Controllers;

use App\Http\Requests\LojaFormRequest;
use App\Models\Loja;

class LojaController extends Controller
{
    public function index()
    {
        return Loja::with('produtos')->get();
    }

    public function show(Loja $loja)
    {
        return $loja;
    }

    public function destroy(Loja $loja)
    {
        $loja->delete();

        return response()->json([
            'message'   => 'Loja removido com sucesso!'
        ], 200);
    }


    public function store(LojaFormRequest $request)
    {
        return response()->json([
            'message'   => 'Loja cadastrado com sucesso!',
            'data'      => Loja::create($request->all())
        ], 201);
    }

    public function update(LojaFormRequest $request, Loja $loja)
    {
        return response()->json([
            'message'   => 'Loja atualizado com sucesso!',
            'data'      => $loja->update($request->all())
        ], 200);
    }
}
