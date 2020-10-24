<?php

$router->get("", "PageController@index");
$router->get("test-get", "PageController@testGet");
$router->get("test-get/{id}", "PageController@testViewSingleItem");
$router->post("test-post", "PageController@testPost");