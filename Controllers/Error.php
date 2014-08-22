<?php

namespace Controllers;

class Error extends \Libs\BaseController {

    public function __construct() {
        parent::__construct();
        $this->outputXml("Error", array("error" => array("error" => "true", "timestamp" => time()), "test" => "1", "test2" => "2"));
    }

}