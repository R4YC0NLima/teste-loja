<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoFormRequest;
use App\Models\{Loja, Produto};

class ProdutoController extends Controller
{
    public function index(Loja $loja)
    {
        $loja->produtos()->get();
        return $loja->load('produtos');
    }

    public function store(ProdutoFormRequest $request, Loja $loja)
    {
        $loja->produtos()->create($request->all());

        return response()->json([
            'message'   => 'Loja cadastrado com sucesso!',
            'data'      => $loja->load('produtos')
        ], 201);
    }

    public function show(Loja $loja, Produto $produto)
    {
        $loja->produtos()->find($produto);
        return $produto;
    }


    public function update(ProdutoFormRequest $request, Loja $loja, Produto $produto)
    {
        $loja->produtos()->find($produto);

        $produto->update($request->all());

        return response()->json([
            'message'   => 'Loja cadastrado com sucesso!',
            'data'      => $loja->load('produtos')
        ], 200);
    }

    public function destroy(Loja $loja, Produto $produto)
    {
        $loja->produtos()->find($produto);

        $produto->delete();

        return response()->json([
            'message'   => 'Produto removido com sucesso!'
        ], 200);
    }
}
