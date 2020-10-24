<?php

use App\App\App;
use App\App\Database\{QueryBuilder, Connection};
use App\Repositories\BaseRepository;

require_once "vendor/autoload.php";
require_once "helpers/corehelper.php";

$app = new App();

$app->bind("config", require "config.php");
//App::bind("config", require "config.php");

/**
 * Avoid DD's in live/production by only enabling them when debug mode is on
 */

//if(App::get("config")["DEBUG"])
$app->checkIfDebugModeShouldBeOn();
/*if(App::get("config")["DEBUG"]) {
    require_once "helpers/debugging.php";
}*/

$app->bind("database", new QueryBuilder(Connection::make(App::get("config")['database'])));
//App::bind("database", new QueryBuilder(Connection::make(App::get("config")['database'])));

$app->bind("repository", new BaseRepository());
//App::bind("repository", new BaseRepository());