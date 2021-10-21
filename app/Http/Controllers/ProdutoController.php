<?php

namespace App\Http\Controllers;

use App\Events\ProdutoAtualizado;
use App\Events\ProdutoCadastrado;
use App\Http\Requests\ProdutoFormRequest;
use Illuminate\Http\JsonResponse;
use App\Models\{Loja, Produto};

class ProdutoController extends Controller
{
    public function index(Loja $loja): Loja
    {
        $loja->produtos()->get();
        return $loja->load('produtos');
    }

    public function store(ProdutoFormRequest $request, Loja $loja): JsonResponse
    {
        $produto = $loja->produtos()->create($request->all());

        event(new ProdutoCadastrado($produto));

        return response()->json([
            'message'   => 'Loja cadastrado com sucesso!',
            'data'      => $loja->load('produtos')
        ], 201);
    }

    public function show(Loja $loja, Produto $produto): Produto
    {
        $loja->produtos()->find($produto);
        return $produto;
    }


    public function update(ProdutoFormRequest $request, Loja $loja, Produto $produto): JsonResponse
    {
        $loja->produtos()->find($produto);

        $produto->update($request->all());

        event(new ProdutoAtualizado($produto));

        return response()->json([
            'message'   => 'Loja atualizado com sucesso!',
            'data'      => $loja->load('produtos')
        ], 200);
    }

    public function destroy(Loja $loja, Produto $produto): JsonResponse
    {
        $loja->produtos()->find($produto);

        $produto->delete();

        return response()->json([
            'message'   => 'Produto removido com sucesso!'
        ], 200);
    }
}
