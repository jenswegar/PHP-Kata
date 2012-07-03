<?php

use Patterns\Builder\CountingMazeBuilder;
use Patterns\Builder\Room;

class CountingMazeBuilderTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new CountingMazeBuilder();

    }

    public function testBuildMaze() {

        $this->model->buildMaze();

        $rtn = $this->model->getCounts();

        $this->assertInternalType('array', $rtn);
        $this->assertArrayHasKey('doors', $rtn);
        $this->assertArrayHasKey('rooms', $rtn);
    }

    public function testBuildRoom(){
        $roomNr = 1;

        $this->model->buildMaze();
        $this->model->buildRoom( $roomNr );

        $counts = $this->model->getCounts();

        $this->assertEquals(1, $counts["rooms"]);
    }

    public function testBuildDoor(){
        $roomNr = 1;
        $roomNr2 = 2;

        $this->model->buildMaze();
        $this->model->buildRoom( $roomNr );
        $this->model->buildRoom( $roomNr2 );

        $this->model->buildDoor($roomNr, $roomNr2);

        $counts = $this->model->getCounts();

        $this->assertEquals(1, $counts["doors"]);

    }
}