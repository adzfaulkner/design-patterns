<?php
namespace Arjf\DesignPatterns\Creational\Prototype\Ipad;
use Arjf\Devices\Handheld\Apple\Ipad;
use Arjf\DesignPatterns\Creational\Prototype\CloneableInterface;

class Air extends Ipad\Air implements CloneableInterface {
    
    public function __clone(){}
    
}
