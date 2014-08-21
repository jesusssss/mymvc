<?php

class Bootstrap {

    public function __construct() {
        if(!empty($_REQUEST["url"])) {
            $url = $_REQUEST["url"];

            $url = rtrim($url, '/');

            $url = explode('/', $url);
        } else {
            $url = array("index");
        }

        $file = CONTROLLERS.$url[0].".php";

        if(file_exists($file)) {
            require $file;
        } else {
            require(CONTROLLERS."error.php");
            $e = new Error();
            return false;
            //throw new Exception("The controller file: " . $file . " does not exists.");
        }


        $controller = new $url[0];

        if(isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if(isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }

}