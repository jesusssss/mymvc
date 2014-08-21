<?php

class BaseController {

    private $doc;
    private $xml;

    public function __construct() {
        $this->doc = new DOMDocument('1.0');
        $this->doc->formatOutput = true;

        self::xmlBuildData();

    }

    protected function xmlBuildData() {
        $this->doc->loadXML("<data><url>test</url><user>Guest</user></data>");
    }

    protected function outputXml() {
        $this->xml = $this->doc->saveXML();
        return $this->xml;
    }

}