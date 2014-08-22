<?php

namespace Controllers;

class Error extends \Libs\BaseController {

   private $plugin = "Error";

    public function __construct() {
        parent::__construct();
        $this->outputXml($this->plugin, array("error" => array("error" => "true", "timestamp" => time()), "test" => "1", "test2" => "2"));
    }

}