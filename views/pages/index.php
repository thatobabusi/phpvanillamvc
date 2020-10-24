<?php

require_once "views/layouts/app_frontend_top.php";

echo "<h1>Page: $title</h1>";
echo "<br/><br/>";


echo "<h2>Data</h2>";
echo "<br/><br/>";

foreach($items as $item) {
    print_r($item->id . " " . $item->description);
    //echo "<a href='/test-get/".$task->id."'>$task->id  $task->description</a>";
    echo "<br/><br/>";
}


require_once "views/layouts/app_frontend_bottom.php";