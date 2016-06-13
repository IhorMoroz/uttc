<?php

namespace core\helpers;

class Routing
{
    private $controller = "\\core\\controllers\\";

    public function __construct()
    {
        $url = explode('/', rtrim(strtolower($_GET['url']), '/'));
        $this->controller .= ($url[0] == "") ? "IndexController" : ucfirst($url[0])."Controller";
        $action = (empty($url[1])) ? "indexAction" : lcfirst($url[1])."Action";
        $param = (!empty($url[2])) ? $this->prepareParam($url) : null ;
        $obj = new $this->controller;
        echo $obj->$action($param);
    }

    private function prepareParam($url)
    {
        $param = [];
        $url = array_splice($url, 2, count($url));
        foreach($url as $p){
            $param[] = $p;
        }
        return $param;
    }
}