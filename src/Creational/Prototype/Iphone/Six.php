<?php
namespace Arjf\DesignPatterns\Creational\Prototype\Iphone;
use Arjf\Devices\Handheld\Apple\Iphone;
use Arjf\DesignPatterns\Creational\Prototype\CloneableInterface;

class Six extends Iphone\Six implements CloneableInterface {
    
    public function __clone(){}
    
}