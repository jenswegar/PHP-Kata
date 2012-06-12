<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../.'));

// Ensure src/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/src'),
    get_include_path(),
)));


// autoload function
spl_autoload_register(function ($class) {
    $class = '' . str_replace('\\', '/', $class) . '.php';
    require_once $class;

    echo $class."\n";
});