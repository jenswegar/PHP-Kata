<?php

namespace Patterns\AbstractFactory;

class Wall extends MapSite{

    public function enter() {
        // you cannot enter a wall so return false
        return false;
    }

}