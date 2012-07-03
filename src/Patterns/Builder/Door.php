<?php

namespace Patterns\Builder;

class Door extends MapSite{

    /**
     *
     * @var Patterns\AbstractFactory\Room
     */
    protected $_room1;

    /**
     *
     * @var Patterns\AbstractFactory\Room
     */
    protected $_room2;

    public function __construct(Room $room1, Room $room2){

        $this->_room1 = $room1;
        $this->_room2 = $room2;

    }

    public function otherSideFrom(Room $room){

        if($room === $this->_room1){
            // if argument is same as room 1, return room 2
            return $this->_room2;
        } else if($room === $this->_room2) {
            // if argument is same as room 2, return room 1
            return $this->_room1;
        } else {
            // if argument does not match any, return null
            return null;
        }

    }

    public function enter() {
        // you can enter a door so return false
        return true;
    }

}