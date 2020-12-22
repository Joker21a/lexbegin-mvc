<?php

use app\lib\App;

require_once (dirname(__DIR__) . "/vendor/autoload.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__DIR__));
define("CONFIG", dirname(__DIR__) . "/config/");
define("SRC", dirname(__DIR__) . "/src/");

$app = new App();
$app->run();