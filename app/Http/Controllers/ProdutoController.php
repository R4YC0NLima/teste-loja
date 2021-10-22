<?php

namespace App\Http\Controllers;

use App\Events\ProdutoAtualizado;
use App\Events\ProdutoCadastrado;
use App\Http\Requests\ProdutoFormRequest;
use App\Repositories\Contracts\LojaRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\{Loja, Produto};

class ProdutoController extends Controller
{
    protected $repository;

    public function __construct(LojaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->relationships('produtos')->findById($request->route('loja'));
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
