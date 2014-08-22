<?php

namespace Controllers;

class User extends \Libs\BaseController {

    private $username;
    private $password;

    public function __construct() {

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

}