<?php

namespace App\Repositories\Core;

use App\Repositories\Exceptions\NotEntityDefined;
use App\Repositories\Contracts\RepositoryInterface;

class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity;

    /**
     * @throws NotEntityDefined
     */
    public function __construct()
    {
        $this->entity = $this->resolveEntity();

    }

    public function getAll()
    {
        return $this->entity->get();
    }

    public function findById($loja)
    {
        return $this->entity->find($loja);
    }

    public function findWhere($column, $loja)
    {
        return $this->entity
            ->where($column, $loja)
            ->get();
    }

    public function relationships(...$relationships): BaseEloquentRepository
    {
        $this->entity = $this->entity->with($relationships);

        return $this;
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(array $data)
    {
        return $this->entity->put($data);
    }

    public function delete($loja)
    {
        return $this->entity->find($loja)->delete();
    }

    /**
     * @throws NotEntityDefined
     */
    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NotEntityDefined;
        }

        return app($this->entity());
    }

}
