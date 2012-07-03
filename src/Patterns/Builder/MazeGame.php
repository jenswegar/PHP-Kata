<?php

namespace Patterns\Builder;

class MazeGame{


/**
 * By changing the $builder argument concrete class, we can modify the type of maze we create simply by using compsition over inheritance.
 *
 * @param  MazeBuilder $builder [description]
 * @return [type]               [description]
 */
    public function createMaze(MazeBuilder $builder){
        $builder->buildMaze();

        $builder->buildRoom(1);
        $builder->buildRoom(2);
        $builder->buildDoor(1, 2);
    }
}