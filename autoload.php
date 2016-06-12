<?php
/**
 * App autoload
 */
spl_autoload_register(function(string $class){
    $filename = '../' . __NAMESPACE__ . '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($filename)) include $filename;
});