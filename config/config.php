<?php
$setting = parse_ini_file("../config.ini");
$config = [
    // Database informations
    "database" => [
        "databaseName" => $setting['DBNAME'],
        "userName"     => $setting["USERNAME"],
        "host"         => $setting["HOST"],
        "password"     => $setting["PASSWORD"]
    ],
    // Default controller, method & parameters
    "default"  => [
        "controller"  => $setting['CONTROLLER'],
        "method"      => $setting['METHOD'],
        "params"      => $setting['PARAMS']
    ]
];
foreach ($config["database"] as $key => $value) :
    define($key, $value);
endforeach;
new Core\Libraries\Route($config["default"]);
