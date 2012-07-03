<?php

use Patterns\Builder\Room;
use Patterns\Builder\Wall;
use Patterns\Builder\Door;

namespace Patterns\Builder;

class CountingMazeBuilder extends MazeBuilder {

    protected $_rooms;
    protected $_doors;

    public function buildMaze(){
        $this->_rooms = 0;
        $this->_doors = 0;
    }

    public function getCounts(){
        return array('doors' => $this->_doors, 'rooms' => $this->_rooms);
    }

    public function buildRoom($roomNr){
        $this->_rooms++;
    }

    public function buildDoor($n1, $n2){
        $this->_doors++;
    }
}