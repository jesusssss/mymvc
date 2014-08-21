<?php

class Index extends BaseController {

    function __construct() {
        parent::__construct();
        echo $this->outputXml();
        include(VIEWS."main.xsl");
    }

}