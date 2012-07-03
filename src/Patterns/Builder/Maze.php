<?php

namespace Patterns\Builder;

class Maze{

    protected $_rooms = array();

    public function addRoom( Room $room){
        $this->_rooms['r'.$room->getRoomNr()] = $room;
    }

    public function getRoom($nr){

        if(array_key_exists('r'.$nr, $this->_rooms)){
            return $this->_rooms['r'.$nr];
        } else {
            return null;
        }

    }
}