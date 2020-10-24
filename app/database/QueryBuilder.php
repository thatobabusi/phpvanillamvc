<?php

namespace App\App\Database;

use App\Models\Item;
use App\Repositories\BaseRepository;
use PDO;

/**
 * Class QueryBuilder
 * @package App\App\Database
 */
class QueryBuilder
{
    /**
     * @var PDO
     */
    protected $database;

    /**
     * @var BaseRepository
     */
    protected $baseRepository;

    /**
     * QueryBuilder constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
        $this->baseRepository = new BaseRepository();
    }

    /**
     * @param string $table
     * @param $id
     * @param null $fetch_class
     * @return array|mixed
     */
    public function getById(string $table, $id, $fetch_class = null)
    {

        $query = $this->database->prepare($this->baseRepository->getById($table, $id));

        $query->execute();

        if($fetch_class)
        {
            return $query->fetch(PDO::FETCH_CLASS, $fetch_class);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $table
     * @param string|null $fetch_class
     * @return array
     */
    public function getAll(string $table, string $fetch_class = null)
    {

        //return $this->baseRepository->getAll2($table, $fetch_class);

        $call = $this->baseRepository->getAll($table);
        $query = $this->database->prepare($call);

        $query->execute();

        if($fetch_class)
        {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetch_class);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $table
     * @param array $parameters
     */
    public function insertData(string $table, array $parameters)
    {

        $a = "INSERT INTO %s (%s) VALUES (%s)";

        $b = implode(",", array_keys($parameters));

        $c = ":" . implode(", :", array_keys($parameters));

        $sql = sprintf("$a", $table,"$b","$c");

        $query = $this->database->prepare($sql);

        $query->execute($parameters);
    }

}