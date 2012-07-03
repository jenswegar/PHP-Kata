<?php
/**
 * This class would act as both the abstract base class for the builders and as the first concrete implementation.
 * We could also first create the abstract class defining the various build methods, but in small projects it probably
 * makes sense to use the first implementation as the base clasee and then extend from there.
 *
 * The downside with using a concrete class as the base is that the methods will exist in the subclasses even though the maybe
 * should not. E.g. the getMaze method might not always be relevant (see CountingMazeBuilder)
 */
use Patterns\Builder\Room;
use Patterns\Builder\Wall;
use Patterns\Builder\Door;

namespace Patterns\Builder;

class MazeBuilder{

    /**
     * Reference to the maze object currently being built
     * @var [type]
     */
    protected $_currentMaze;

    public function buildMaze(){
        $this->_currentMaze = new Maze();
        return $this->_currentMaze;
    }

    public function getMaze(){
        return $this->_currentMaze;
    }

    public function buildRoom($roomNr){
        if( $this->_currentMaze->getRoom($roomNr) === null ){
            $room = new Room( $roomNr );

            $room->setSide(ROOM::NORTH, new Wall() );
            $room->setSide(ROOM::EAST, new Wall() );
            $room->setSide(ROOM::SOUTH, new Wall() );
            $room->setSide(ROOM::WEST, new Wall() );

            $this->_currentMaze->addRoom( $room );
        }
    }

    public function buildDoor($n1, $n2){
        $r1 = $this->_currentMaze->getRoom($n1);
        $r2 = $this->_currentMaze->getRoom($n2);

        $door = new Door($r1, $r2);

        $r1->setSide(Room::EAST, $door);
        $r2->setSide(Room::WEST, $door);
    }
}