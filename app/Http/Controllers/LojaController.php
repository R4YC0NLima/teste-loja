<?php

namespace App\Http\Controllers;

use App\Http\Requests\LojaFormRequest;
use App\Models\Loja;
use App\Repositories\Contracts\LojaRepositoryInterface;
use Illuminate\Http\JsonResponse;

class LojaController extends Controller
{
    protected $repository;

    public function __construct(LojaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->relationships('produtos')->getAll();
    }

    public function show($loja): Loja
    {
        return $this->repository->relationships('produtos')->findById($loja);
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
            'data'      => $this->repository->store($request->all())
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
