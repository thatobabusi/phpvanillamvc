<?php

namespace App\App\Database;

use PDO;

/**
 * Class Connection
 * @package App\App\Database
 */
class Connection
{
    /**
     * @param array $config
     * @return PDO
     */
    public static function make(array $config)
    {
        try
        {
            return new PDO(
                "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }
    }
}