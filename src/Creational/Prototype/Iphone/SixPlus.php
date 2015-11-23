<?php
namespace Arjf\DesignPatterns\Creational\Prototype\Iphone;
use Arjf\Devices\Handheld\Apple\Iphone;
use Arjf\DesignPatterns\Creational\Prototype\CloneableInterface;

class SixPlus extends Iphone\SixPlus implements CloneableInterface {
    
    public function __clone(){}
    
}