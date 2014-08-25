<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

require 'vendor/autoload.php';



require("Libs/Config.php");
//require("libs/controller.php");
//require("libs/bootstrap.php");


$app = new \Libs\Bootstrap();

