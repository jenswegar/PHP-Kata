<?php

use Patterns\Creational\Singleton;

class SingletonTest extends PHPUnit_Framework_TestCase
{
    public function testCanCreateSingletonInstance()
    {
        $instance = Singleton::getInstance();

        $this->assertInstanceOf('Patterns\Creational\Singleton', $instance);

        $instance2 = Singleton::getInstance();

        $this->assertSame($instance, $instance2);


    }

}
?>