<?php

use Patterns\AbstractFactory\Door;
use Patterns\AbstractFactory\Room;

class DoorTest extends PHPUnit_Framework_TestCase
{

    public function testEnteringOpenDoorReturnsTrue(){

        $r1 = new Room(1);
        $r2 = new Room(2);

        $door = new Door($r1, $r2);

        $this->assertTrue( $door->enter() );
    }

    public function testCanGetRoomOnOtherSide(){
        $r1 = new Room(1);
        $r2 = new Room(2);

        $door = new Door($r1, $r2);

        $other = $door->otherSideFrom($r1);
        $this->assertSame($other, $r2);

        $other = $door->otherSideFrom($r2);
        $this->assertSame($other, $r1);

        $r3 = new Room(3);

        $other = $door->otherSideFrom($r3);
        $this->assertNull( $other );

    }
}
?>