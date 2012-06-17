<?php

namespace Patterns\AbstractFactory;

class MazeGame{


/**
 * By changing the $factory argument concrete class, we can modify the type of maze we create simply.
 * Layout however is still dictated by this method. (but this could be changed by adding some sort of layout class or reading
 * a layout from a file etc.)
 *
 * @param  MazeFactory $factory [description]
 * @return [type]               [description]
 */
    public function createMaze(MazeFactory $factory){
        $maze = $factory->createMaze();

        $r1 = $factory->createRoom(1);
        $r2 = $factory->createRoom(2);
        $d = $factory->createDoor($r1, $r2);

        $maze->addRoom($r1);
        $maze->addRoom($r2);

        $r1->setSide(ROOM::NORTH, $factory->createWall() );
        $r1->setSide(ROOM::EAST, $d );
        $r1->setSide(ROOM::SOUTH, $factory->createWall() );
        $r1->setSide(ROOM::WEST, $factory->createWall() );

        $r2->setSide(ROOM::NORTH, $factory->createWall() );
        $r2->setSide(ROOM::EAST, $factory->createWall() );
        $r2->setSide(ROOM::SOUTH, $factory->createWall() );
        $r2->setSide(ROOM::WEST, $d );

        return $maze;
    }
}