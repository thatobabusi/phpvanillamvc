<?php

namespace App\Repositories;

use App\App\App;
use App\App\Database\Connection;
use App\App\Database\QueryBuilder;
use PDO;

class BaseRepository implements BaseRepositoryInterface
{

    public function getAll($table)
    {
        return "select * from {$table};";
    }

    public function getById(string $table, $id)
    {
        return "select * from {$table} where id = {$id};";
    }

    public function getWhere(string $field, string $operator, $value, string $table)
    {
        return "select * from {$table} where {$field} {$operator} {$value};";
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }

}