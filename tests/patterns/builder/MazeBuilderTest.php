<?php

use Patterns\Builder\MazeBuilder;
use Patterns\Builder\Room;

class MazeBuilderTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new MazeBuilder();
    }

    public function testBuildMaze() {

        $this->model->buildMaze();

        $rtn = $this->model->getMaze();

        $this->assertInstanceOf('Patterns\Builder\Maze', $rtn);
    }

    public function testBuildRoom(){
        $roomNr = 1;

        $this->model->buildMaze();
        $this->model->buildRoom( $roomNr );

        $maze = $this->model->getMaze();

        $this->assertInstanceOf('Patterns\Builder\Maze', $maze);

        $this->assertInstanceOf('Patterns\Builder\Room', $maze->getRoom($roomNr) );
    }

    public function testBuildDoor(){
        $roomNr = 1;
        $roomNr2 = 2;

        $this->model->buildMaze();
        $this->model->buildRoom( $roomNr );
        $this->model->buildRoom( $roomNr2 );

        $this->model->buildDoor($roomNr, $roomNr2);

        $maze = $this->model->getMaze();

        $d1 = $maze->getRoom($roomNr)->getSide(Room::EAST);

        $this->assertInstanceOf('Patterns\Builder\Door', $d1);
    }
}