<?php
namespace Arjf\DesignPatterns\Creational\Factory;
use Arjf\Devices\Handheld\Apple\Iphone\Six;
use \Arjf\Devices\Handheld\Apple\Iphone\SixPlus;
use \Arjf\Devices\Handheld\Apple\Screen;

class Iphone extends AppleHandheld 
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
                return new SixPlus($this->getScreen(), $colour, $capacity);
            case self::SMALL:
                return new Six($this->getScreen(), $colour, $capacity);
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
        return new Screen(320, 480);
    }
}
