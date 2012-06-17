<?php
/**
 * This class acts as both the abstract factory and the first concrete implementation in the AbstractFactory pattern.
 *
 * By doing it this way we can provide a default implementation and only need to override methods that need to change in subclasses
 */


namespace Patterns\AbstractFactory;

class MazeFactory{

    public function createMaze(){
        return new Maze();
    }

    public function createWall(){
        return new Wall();
    }

    public function createRoom($roomNr) {
        return new Room( (int) $roomNr);
    }

    public function createDoor(Room $room1, Room $room2) {
        return new Door($room1, $room2);
    }

}