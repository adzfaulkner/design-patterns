<?php
namespace Arjf\DesignPatterns\Creational\Prototype\Ipad;
use Arjf\Devices\Handheld\Apple\Ipad;
use Arjf\DesignPatterns\Creational\Prototype\CloneableInterface;

class Mini extends Ipad\Mini implements CloneableInterface {
    
    public function __clone(){}
    
}