<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();
    public function findById($id);
//    public function findWhere($column, $valor);
//    public function findWhereFirst($column, $valor);
    public function store(array $data);
    public function update(array $data);
    public function delete(array $id);
}
