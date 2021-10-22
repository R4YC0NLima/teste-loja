<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Loja;
use App\Models\Produto;
use App\Repositories\Contracts\LojaRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;

class EloquentLojaRepository extends BaseEloquentRepository implements LojaRepositoryInterface
{
    public function entity(): string
    {
        return Loja::class;
    }
}
