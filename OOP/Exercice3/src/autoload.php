<?php

function load($className) {
    $classLocation = __DIR__ . "/" . $className . '.php';
    if (file_exists($classLocation)) {
        require_once $classLocation;
    }
}

spl_autoload_register('load');