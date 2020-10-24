<?php

namespace App\App;

/**
 * Class App
 * @package App\App
 */
class App
{

    /**
     * @var array
     */
    protected static $registry = [];

    /**
     * @param string $key
     * @param $val
     */
    public static function bind(string $key, $val)
    {
        static::$registry[$key] = $val;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        return static::$registry[$key];
    }

    public function checkIfDebugModeShouldBeOn()
    {

        if(App::get("config")["DEBUG"]) {
            error_reporting(E_ALL);
            require_once dirname( dirname(__FILE__ ) ) . "/app/helpers/debugging.php";
        }

        else {
            error_reporting(0);
        }
    }
}