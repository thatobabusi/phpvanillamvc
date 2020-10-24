<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function getAll($table);

    public function getById(string $table, $id);

    public function getWhere(string $field, string $operator, $value, string $table);

    public function update($id);

    public function delete($id);

}