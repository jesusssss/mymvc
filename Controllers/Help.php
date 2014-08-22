<?php

namespace Controllers;

class Help extends \Libs\BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function other() {
        echo "We are inside help -> other";
    }

}