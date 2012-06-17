<?php

use Patterns\AbstractFactory\Room;
use Patterns\AbstractFactory\Wall;

class RoomTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    public function setUp(){
        $this->model = new Room(1);
        parent::setUp();
    }

    public function testCanCreateRoom() {

        $this->assertEquals(1, $this->model->getRoomNr() );

    }

    public function testCanEnterRoom(){
        $this->assertTrue($this->model->enter());
    }

    public function testCanSetSide(){

        $s1 = new Wall();
        $this->model->setSide(ROOM::NORTH, $s1);

        $rtn = $this->model->getSide(ROOM::NORTH);

        $this->assertSame($s1, $rtn);

    }
}
?>