<?php

namespace Patterns\Builder;

class Wall extends MapSite{

    public function enter() {
        // you cannot enter a wall so return false
        return false;
    }

}