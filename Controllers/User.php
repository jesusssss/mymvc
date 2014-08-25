<?php

namespace Controllers;

class User extends \Libs\BaseController {

    private $username;
    private $password;
    private $plugin = "User";

    public function __construct() {
        $this->outputXml($this->plugin, array("error" => array("error" => "true", "timestamp" => time()), "test" => "1", "test2" => "2"));
    }

    public function isLoggedIn() {
        if($this->sget('user')) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsername() {
        if($this->isLoggedIn()) {
            return $this->username;
        } else {
            return "Guest";
        }
    }

    public function createUser() {
        $username = $this->pget("createUser-username");
        $password = $this->pget("createUser-password");
    }

    public function login() {
    }

}