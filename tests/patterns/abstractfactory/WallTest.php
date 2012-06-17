<?php

use Patterns\AbstractFactory\Wall;

class WallTest extends PHPUnit_Framework_TestCase
{

    public function testEnteringWallReturnsFalse(){
        $wall = new Wall();

        $this->assertFalse( $wall->enter() );
    }
}
?>