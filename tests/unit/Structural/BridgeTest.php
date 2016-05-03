<?php
use Arjf\DesignPatterns\Structural\Bridge;

class BridgeTest extends PHPUnit_Framework_TestCase {
    public function testScreenInit()
    {
        $screen = new Bridge\Screen(320, 480);
        $this->assertEquals(1,$screen->getContrast());
        $this->assertTrue($screen->isIlluminated());        
    }
    
    public function testScreenContrastDecreaseFloor()
    {
        $screen = new Bridge\Screen(320, 480);
        $screen->decreaseContrast();
        $this->assertEquals(Bridge\Screen::CONTRAST_FLOOR, $screen->getContrast());
    }
    
    public function testScreenIncreaseContrastWhilstDarkened()
    {
        $screen = new Bridge\Screen(320, 480);
        $screen->darken()
                ->increaseContrast();
        $this->assertEquals(Bridge\Screen::CONTRAST_FLOOR, $screen->getContrast());
    }
    
    public function testScreenContrastIterate()
    {
        $screen = new Bridge\Screen(320, 480);
        
        for ($i = $screen->getContrast() + 1;$i < Bridge\Screen::CONTRAST_CEIL;$i++) {
            $screen->increaseContrast();
            $this->assertEquals($i, $screen->getContrast());
        }
        
        $screen->increaseContrast();
        $this->assertEquals(Bridge\Screen::CONTRAST_CEIL, $screen->getContrast());
        
        for ($i = Bridge\Screen::CONTRAST_CEIL - 1;$i >= Bridge\Screen::CONTRAST_FLOOR;$i--) {
            $screen->decreaseContrast();
            $this->assertEquals($i, $screen->getContrast());
        }
    }
    
    public function testHomeButtonPressed()
    {
        $screen = new Bridge\Screen(320, 480);
        $controls = new Bridge\DeviceControls($screen);
        $controls->homeButtonPressed();
        $this->assertFalse($screen->isIlluminated());
        $controls->homeButtonPressed();
        $this->assertTrue($screen->isIlluminated());
        $controls->homeButtonPressed();
        $this->assertFalse($screen->isIlluminated());
    }
    
    public function testContrastSwiped()
    {
        $screen = new Bridge\Screen(320, 480);
        $controls = new Bridge\DeviceControls($screen);
        $controls->accessbilityContrastSlideRight();
        $this->assertEquals(2, $screen->getContrast());
        $controls->accessbilityContrastSlideLeft();
        $this->assertEquals(1, $screen->getContrast());
        $controls->accessbilityContrastSlideLeft();
        $this->assertEquals(1, $screen->getContrast());
        for ($i = 0;$i < 6;$i++) {
            $controls->accessbilityContrastSlideRight();
        }
        $this->assertEquals(7, $screen->getContrast());
    }
}
