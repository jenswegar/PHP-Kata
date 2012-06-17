<?php

use Patterns\AbstractFactory\MazeFactory;
use Patterns\AbstractFactory\Room;

class MazeFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new MazeFactory();
    }

    public function testCanCreateMaze(){

        $rtn = $this->model->createMaze();

        $this->assertInstanceOf('Patterns\AbstractFactory\Maze', $rtn);

    }

    public function testCanCreateWall(){

        $rtn = $this->model->createWall();

        $this->assertInstanceOf('Patterns\AbstractFactory\Wall', $rtn);

    }

    public function testCanCreateRoom(){

        $rtn = $this->model->createRoom(1);

        $this->assertInstanceOf('Patterns\AbstractFactory\Room', $rtn);
        $this->assertEquals($rtn->getRoomNr(), 1);

    }

    public function testCanCreateDoor(){
        $r1 = new Room(1);
        $r2 = new Room(2);

        $d = $this->model->createDoor($r1, $r2);

        $this->assertInstanceOf('Patterns\AbstractFactory\Door', $d);
    }

}
?>