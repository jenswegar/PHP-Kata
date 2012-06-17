<?php

use Patterns\AbstractFactory\Maze;
use Patterns\AbstractFactory\Room;

class MazeTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new Maze();
    }

    public function testCanAddRoom() {

        $room = new Room(1);

        $this->model->addRoom($room);

        $rtn = $this->model->getRoom(1);

        $this->assertSame($room, $rtn);

    }
}
?>