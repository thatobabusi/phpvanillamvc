<?php

return [

    "app_name" => "Thato Test",

    "app_environment" => "local", //production //live //staging //testing

    "database" => [
        "driver"        => "mysql",
        "host"          => "192.168.10.10",
        "username"      => "homestead",
        "password"      => "secret",
        "dbname"        => "vanilla",
        "chartset"      => "ut8",
        "prefix"        => "",
        "options"       => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ],
    "DEBUG" => TRUE,
];