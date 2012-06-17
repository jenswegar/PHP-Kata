<?php

use Patterns\AbstractFactory\EnchantedMazeFactory;
use Patterns\AbstractFactory\Room;

class EnchantedMazeFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new EnchantedMazeFactory();
    }


    public function testCanCreateRoomWithSpell(){

        $rtn = $this->model->createRoom(1);

        $this->assertInstanceOf('Patterns\AbstractFactory\EnchantedRoom', $rtn);
        $this->assertEquals($rtn->getRoomNr(), 1);

    }

    public function testCanCreateDoorNeedingSpell(){
        $r1 = new Room(1);
        $r2 = new Room(2);

        $d = $this->model->createDoor($r1, $r2);

        $this->assertInstanceOf('Patterns\AbstractFactory\DoorNeedingSpell', $d);
    }

}
?>