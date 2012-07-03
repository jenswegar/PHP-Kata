<?php

use Patterns\Builder\MazeGame;
use Patterns\Builder\Room;
use Patterns\Builder\MazeBuilder;
use Patterns\Builder\CountingMazeBuilder;

class MazeGameBuilderTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new MazeGame();
    }

    public function testCanCreateMaze() {

        $builder = new MazeBuilder();

        $this->model->createMaze( $builder );
        $maze = $builder->getMaze();

        $this->assertInstanceOf('Patterns\Builder\Maze', $maze);

        $r1 = $maze->getRoom(1);
        $this->assertInstanceOf('Patterns\Builder\Room', $r1);

        $r2 = $maze->getRoom(2);
        $this->assertInstanceOf('Patterns\Builder\Room', $r2);

        $d = $r1->getSide(Room::EAST);

        $this->assertInstanceOf('Patterns\Builder\Door', $d);

        $this->assertSame($r2, $d->otherSideFrom($r1) );
    }

    public function testCanCreateCountingMaze(){
        $builder = new CountingMazeBuilder();

        $this->model->createMaze( $builder );
        $counts = $builder->getCounts();

        $this->assertEquals(2, $counts['rooms']);
        $this->assertEquals(1, $counts['doors']);
    }

}