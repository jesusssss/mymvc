<?php

namespace Libs;

use Controllers\User;

class BaseController {

    private $xmlData;
    private $doc;
    private $xml;
    private $xsl;
    private $proc;

    /**
     * Constructing the XML / XSL / Processor
     */

    public function __construct() {

        //Write default config to global variable data
        $this->xmlData = self::xmlBuildData();

        //Creating empty XML Dom document
        $this->doc = new \SimpleXMLElement($this->xmlBuildData());
        //$this->doc->formatOutput = true;

        //Write default config to global variable data
        $this->xmlData = self::xmlBuildData();

        //Creating the XSL view DOMDocument
        $this->xsl = new \DOMDocument();

        //Creating the XSL proccessor to understand the XML/XSL
        $this->proc = new \XSLTProcessor;
    }

    /**
     * Building standard data
     */

    protected function xmlBuildData() {
        $url = strtok($_SERVER['REQUEST_URI'], '?');
//        $user = new User();
//
//        $username = $user->getUsername();

        return "<data><config><url>$url</url><user>Guest</user></config></data>";
    }

    /**
     * Function for outputting the given xml to the three
     */

    protected function outputXml($plugin, $nodes = array()) {
        $pluginElement = $this->doc->addChild("plugin");
        $pluginElement->addAttribute('plugin', $plugin);

        if(!empty($nodes)) {
            $i = 0;
            foreach($nodes as $node => $value) {
                if(is_array($value)) {
                    $listElement = $pluginElement->addChild("list");
                    $listElement->addAttribute("type", $node);
                    $ia = 0;
                    foreach($value as $n => $v) {
                        $elementElement = $listElement->addChild("element", $v);
                        $elementElement->addAttribute("type", $n);
                        $elementElement->addAttribute("id", $ia);
                        $ia++;
                    }
                } else {
                    $listElement = $pluginElement->addChild("list");
                    $listElement->addAttribute("type", $node);
                    $elementElement = $listElement->addChild("element", $value);
                    $elementElement->addAttribute("id", $i);
                    $i++;
                }
            }
        }
    }

    protected function sget($get) {
        if(isset($_SESSION[$get])) {
            return true;
        } else {
            return false;
        }
    }

    protected function pget($get) {

        //If the request is not empty, fetch it
        if(isset($_REQUEST[$get])) {
            if(strlen($_REQUEST[$get]) == 0) {
                return true;
            } else {
                return $_REQUEST[$get];
            }
        } else {
            return false;
        }
    }

    /**
     * Desctructor allways runs the Main VIEW
     */
    public function __destruct() {
        //Saves the current xml tree to the DomDocument
        $this->xml = $this->doc->saveXML();

        //Outputting the page as wanted by user (If post ?xml isset, output the xml only)
        if($this->pget("xml")) {
            header('Content-type: text/xml');
            echo $this->doc->asXML();
        } else {
            //Loads the main.xsl to XSL DomDocument
            $this->xsl->load(VIEWS."/xsl/main.xsl");

            //Puts the two together
            $this->proc->importStylesheet($this->xsl);

            echo $this->proc->transformToXml($this->doc);
        }
    }

}