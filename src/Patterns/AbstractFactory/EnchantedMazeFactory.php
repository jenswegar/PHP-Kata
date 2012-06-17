<?php

/**
 * This is an example of a subclass to the AbstractFactory. It creates magic rooms and doors.
 */

namespace Patterns\AbstractFactory;

class EnchantedMazeFactory extends MazeFactory{

    public function createRoom($roomNr) {
        return new EnchantedRoom( (int) $roomNr, "superspell");
    }

    public function createDoor(Room $room1, Room $room2) {
        return new DoorNeedingSpell($room1, $room2);

    }

}