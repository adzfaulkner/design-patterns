<?php
use Arjf\DesignPatterns\Creational\Prototype;
use Arjf\Devices\Handheld\Apple\Screen;

class PrototypeTest extends PHPUnit_Framework_TestCase {
    public function testCloneIpadAir()
    {
        $screen = new Screen(1024, 768);
        $device = new Prototype\Ipad\Air($screen);
        $device2 = clone $device;
        $this->assertNotSame($device, $device2);
    }
    
    public function testCloneIpadMini()
    {
        $screen = new Screen(1024, 768);
        $device = new Prototype\Ipad\Mini($screen);
        $device2 = clone $device;
        $this->assertNotSame($device, $device2);
    }
    
    public function testCloneIphoneSix()
    {
        $screen = new Screen(320, 480);
        $device = new Prototype\Iphone\Six($screen);
        $device2 = clone $device;
        $this->assertNotSame($device, $device2);
    }
    
    public function testCloneIphoneSixPlus()
    {
        $screen = new Screen(320, 480);
        $device = new Prototype\Iphone\SixPlus($screen);
        $device2 = clone $device;
        $this->assertNotSame($device, $device2);
    }
}
