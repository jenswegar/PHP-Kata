<?php

namespace Patterns\Creational;

class Singleton{

    protected static $_instance;

    private function __construct(){

    }

    public static function getInstance(){
        if(self::$_instance === null) self::$_instance = new Singleton();

        return self::$_instance;
    }
}