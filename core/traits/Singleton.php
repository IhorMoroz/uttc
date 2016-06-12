<?php

namespace core\traits;


trait Singleton
{
    static private $_instance;

    static public function getInstance()
    {
        if(empty(static::$_instance)){
            static::$_instance = new static();
        }
        return static::$_instance;
    }

    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}
}