<?php

namespace Patterns\AbstractFactory;

class Maze{

    protected $_rooms = array();

    public function addRoom( Room $room){
        $this->_rooms['r'.$room->getRoomNr()] = $room;
    }

    public function getRoom($nr){
        return $this->_rooms['r'.$nr];
    }
}