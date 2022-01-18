<?php

spl_autoload_register(function($className){
    $file = __DIR__ . $className . ".php";

    if(file_exists($file)){
        include $file;
        return true;
    }
    return false;

});