<?php
include_once __DIR__ . "/vendor/autoload.php";

// use SecureEnvPHP\SecureEnvPHP;

// (new SecureEnvPHP())->parse('.env.enc', '.env.key');


$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
