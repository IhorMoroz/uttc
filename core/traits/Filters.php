<?php

namespace core\traits;

trait Filters{

    public function Filter($type = '')
    {
        switch($type){
            case 'int' :
                return function($data){return (int)strip_tags($data);};
                break;
            case 'str' :
                return function($data){return (string)strip_tags($data);};
                break;
            case 'email' :
                return function($data){return (string)filter_var($data, FILTER_VALIDATE_EMAIL);};
                break;
            default :
                return function($data){return strip_tags($data);};
        }
    }
}