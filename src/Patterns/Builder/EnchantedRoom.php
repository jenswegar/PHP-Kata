<?php

namespace Patterns\Builder;

class EnchantedRoom extends Room{

    protected $_spell;

    public function __construct($roomNr, $spell){

        parent::__construct($roomNr);

        $this->_spell = $spell;

    }


}