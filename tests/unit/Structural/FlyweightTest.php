<?php
use Arjf\DesignPatterns\Structural\Flyweight\ScreenFlyweightFactory;

class FlyweightTest extends PHPUnit_Framework_TestCase {
    
    public function testFlyweightRetinaSameInstance()
    {
        $factory = new ScreenFlyweightFactory();
        $screen1 = $factory->getRetinaScreen(320, 480);
        $screen2 = $factory->getRetinaScreen(320, 480);
        
        $this->assertSame($screen1, $screen2);
        $this->assertTrue($screen1->isRetina());
    }
    
    public function testFlyweightRetinaNotSameInstance()
    {
        $factory = new ScreenFlyweightFactory();
        $screen1 = $factory->getRetinaScreen(120, 400);
        $screen2 = $factory->getRetinaScreen(320, 480);
        
        $this->assertTrue($screen1 !== $screen2);
        $this->assertTrue($screen1->isRetina());
        $this->assertTrue($screen2->isRetina());
    }
    
    public function testFlyweightNonRetinaSameInstance()
    {
        $factory = new ScreenFlyweightFactory();
        $screen1 = $factory->getNonRetinaScreen(640, 920);
        $screen2 = $factory->getNonRetinaScreen(640, 920);
        
        $this->assertSame($screen1, $screen2);
        $this->assertFalse($screen1->isRetina());
    }
    
    public function testFlyweightNonRetinaNotSameInstance()
    {
        $factory = new ScreenFlyweightFactory();
        $screen1 = $factory->getNonRetinaScreen(1220, 4500);
        $screen2 = $factory->getNonRetinaScreen(1195, 4000);
        
        $this->assertTrue($screen1 !== $screen2);
        $this->assertFalse($screen1->isRetina());
        $this->assertFalse($screen2->isRetina());
    }
    
}
