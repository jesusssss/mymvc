<?php

namespace Libs;

use Controllers\Error;

class Bootstrap {

    public function what() {
        echo "WHAT WHAT WHAT";
    }

    public function __construct() {

        if(!empty($_POST)) {
            $action = 0;
            foreach($_POST as $post => $val) {
                if (strpos($post,'action') !== false) {
                    $this->runAction($post);
                    $action = 1;
                }
            }
            if($action == 0) {
               $index = new \Controllers\Index;
            }
            echo $action;
        } else {
            $index = new \Controllers\Index;
        }


//        if(!empty($_REQUEST["url"])) {
//            $url = $_REQUEST["url"];
//
//            $url = rtrim($url, '/');
//
//            $url = explode('/', $url);
//        } else {
//            $url = array("Index");
//        }
//
//        $urlUpper = ucfirst($url[0]);
//
//        $file = CONTROLLERS.$urlUpper.".php";
//
//        if(file_exists($file)) {
//            require $file;
//        } else {
//            $e = new Error();
//            return false;
//            //throw new Exception("The controller file: " . $file . " does not exists.");
//        }
//
//        $fetch = "\\Controllers\\$urlUpper";
//        $controller = new $fetch;
//
//        if(isset($url[2])) {
//            $controller->{$url[1]}($url[2]);
//        } else {
//            if(isset($url[1])) {
//                $controller->{$url[1]}();
//            }
//        }
    }

    public function runAction($post) {
        $toDo = explode('-',$post);
        $controller = "\\Controllers\\". ucfirst($toDo[1]);
        $function = $toDo[2];

        $doController = new $controller;
        $doController->{$function}();
    }

}