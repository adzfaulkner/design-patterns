<?php
use Arjf\DesignPatterns\Creational\Factory;

class FactoryTest extends PHPUnit_Framework_TestCase {
    public function testGetIpadMini()
    {
        $factory = new Factory\Ipad();
        $device = $factory->build(Factory\Ipad::SMALL);
        $this->assertInstanceOf('Arjf\Devices\Handheld\Apple\Ipad\Mini', $device);
    }
    
    public function testGetIpadAir()
    {
        $factory = new Factory\Ipad();
        $device = $factory->build(Factory\Ipad::LARGE);
        $this->assertInstanceOf('Arjf\Devices\Handheld\Apple\Ipad\Air', $device);
    }
    
    public function testGetIphoneSix()
    {
        $factory = new Factory\Iphone();
        $device = $factory->build(Factory\Iphone::SMALL);
        $this->assertInstanceOf('Arjf\Devices\Handheld\Apple\Iphone\Six', $device);
    }
    
    public function testGetIphoneSixPlus()
    {
        $factory = new Factory\Iphone();
        $device = $factory->build(Factory\Iphone::LARGE);
        $this->assertInstanceOf('Arjf\Devices\Handheld\Apple\Iphone\SixPlus', $device);
    }
    
    /**
     * @expectedException     InvalidArgumentException
     */
    public function testUnknownIpadSize()
    {
        $factory = new Factory\Ipad();
        $factory->build('micro');
    }
}
