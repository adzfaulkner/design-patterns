<?php
namespace Arjf\DesignPatterns\Creational\Factory;
use Arjf\Devices\Handheld\AbstractAppleHandheld;

abstract class AppleHandheld {
    const LARGE = 'large';
    const SMALL = 'small';
    
    public function build(
        $size, 
        $colour = AbstractAppleHandheld::DEFAULT_COLOUR, 
        $capacity = AbstractAppleHandheld::DEFAULT_CAPACITY
    ) {
        $device = $this->selectDevice($size, $colour, $capacity);
        return $device;
    }
    
    abstract protected function selectDevice($size, $colour, $capacity);
    abstract protected function getScreen();
}
