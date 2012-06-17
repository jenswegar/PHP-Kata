<?php

namespace Patterns\AbstractFactory;

class Room extends MapSite{


    const NORTH = "north";
    const EAST = "east";
    const SOUTH = "south";
    const WEST = "west";

    protected $_roomNr;

    protected $_sides = array();

    public function __construct($roomNr){

        $this->_roomNr = (int) $roomNr;

    }

    public function setSide($dir, $part){
        $this->_sides[$dir] = $part;
    }

    public function getSide($dir){
        return $this->_sides[$dir];
    }


    public function getRoomNr(){
        return $this->_roomNr;
    }

    public function enter(){
        return true;
    }


}