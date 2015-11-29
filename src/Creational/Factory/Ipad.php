<?php
namespace Arjf\DesignPatterns\Creational\Factory;
use \Arjf\Devices\Handheld\Apple\Ipad\Air;
use \Arjf\Devices\Handheld\Apple\Ipad\Mini;
use \Arjf\Devices\Handheld\Apple\Screen;

class Ipad extends AppleHandheld 
{
    
    /**
     * 
     * @param type $size
     * @param type $colour
     * @param type $capacity
     * @return \Arjf\Devices\Handheld\Apple\Ipad\Air|\Arjf\Devices\Handheld\Apple\Ipad\Mini
     * @throws \InvalidArgumentException
     */
    protected function selectDevice($size, $colour, $capacity) 
    {
        switch ($size) {
            case self::LARGE:
                return new Air($this->getScreen(), $colour, $capacity);
            case self::SMALL:
                return new Mini($this->getScreen(), $colour, $capacity);
            default:
                throw new \InvalidArgumentException('Size parameter not recognised');
        }
    }
    
    /**
     * 
     * @return Screen
     */
    protected function getScreen() 
    {
        return new Screen(1024, 768);
    }
}
