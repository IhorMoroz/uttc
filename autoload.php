<?php
/**
 * App autoload
 */
spl_autoload_register(function(string $class){
    $filename = __DIR__. '/' . __NAMESPACE__ . '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($filename)) include $filename;
});