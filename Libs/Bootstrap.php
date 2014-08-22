<?php

namespace Libs;

use Controllers\Error;

class Bootstrap {

    public function __construct() {
        if(!empty($_REQUEST["url"])) {
            $url = $_REQUEST["url"];

            $url = rtrim($url, '/');

            $url = explode('/', $url);
        } else {
            $url = array("Index");
        }

        $urlUpper = ucfirst($url[0]);

        $file = CONTROLLERS.$urlUpper.".php";

        if(file_exists($file)) {
            require $file;
        } else {
            $e = new Error();
            return false;
            //throw new Exception("The controller file: " . $file . " does not exists.");
        }

        $fetch = "\\Controllers\\$urlUpper";
        $controller = new $fetch;

        if(isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if(isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }

}