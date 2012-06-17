<?php

use Patterns\AbstractFactory\MazeGame;
use Patterns\AbstractFactory\Room;
use Patterns\AbstractFactory\MazeFactory;
use Patterns\AbstractFactory\EnchantedMazeFactory;

class MazeGameTest extends PHPUnit_Framework_TestCase
{

    protected $model;

    public function setUp(){
        parent::setUp();
        $this->model = new MazeGame();
    }

    public function testCanCreateMaze() {

        $factory = new MazeFactory();

        $maze = $this->model->createMaze( $factory );

        $this->assertInstanceOf('Patterns\AbstractFactory\Maze', $maze);

        $r1 = $maze->getRoom(1);
        $this->assertInstanceOf('Patterns\AbstractFactory\Room', $r1);

        $r2 = $maze->getRoom(2);
        $this->assertInstanceOf('Patterns\AbstractFactory\Room', $r2);

        $d = $r1->getSide(Room::EAST);

        $this->assertInstanceOf('Patterns\AbstractFactory\Door', $d);

        $this->assertSame($r2, $d->otherSideFrom($r1) );

    }

    public function testCanCreateEnchantedMaze() {

        $factory = new EnchantedMazeFactory();

        $maze = $this->model->createMaze( $factory );

        $this->assertInstanceOf('Patterns\AbstractFactory\Maze', $maze);

        $r1 = $maze->getRoom(1);
        $this->assertInstanceOf('Patterns\AbstractFactory\EnchantedRoom', $r1);

        $r2 = $maze->getRoom(2);
        $this->assertInstanceOf('Patterns\AbstractFactory\EnchantedRoom', $r2);

        $d = $r1->getSide(Room::EAST);

        $this->assertInstanceOf('Patterns\AbstractFactory\DoorNeedingSpell', $d);

        $this->assertSame($r2, $d->otherSideFrom($r1) );

    }

}
?>