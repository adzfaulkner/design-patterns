<?php
use Arjf\DesignPatterns\Structural\Decorator;
use Arjf\Devices\Handheld\Apple;
use Arjf\Devices\Handheld\AbstractAppleHandheld;

class DecoratorTest extends PHPUnit_Framework_TestCase {
    public function testIpadMiniWithMobileData()
    {
        $device = $this->deviceFactory('Ipad\Mini');
        $option = new Decorator\Ipad\MobileData($device);
        
        $this->assertEquals(
            $device->getPrice() + Decorator\Ipad\MobileData::DEFAULT_PRICE, 
            $option->getPrice()
        );
    }
    
    public function testIpadMiniWith16gb()
    {
        $device = $this->deviceFactory('Ipad\Mini');
        $option = new Decorator\Ipad\Storage16gb($device);
        
        $this->assertEquals(
            $device->getPrice() + Decorator\Ipad\Storage16gb::DEFAULT_PRICE, 
            $option->getPrice()
        );
    }
    
    public function testIpadMiniWith32gb()
    {
        $device = $this->deviceFactory('Ipad\Mini');
        $option = new Decorator\Ipad\Storage32gb($device);
        
        $this->assertEquals(
            $device->getPrice() + Decorator\Ipad\Storage32gb::DEFAULT_PRICE, 
            $option->getPrice()
        );
    }
    
    public function testIpadMiniWith16gbAndMobileData()
    {
        $device = $this->deviceFactory('Ipad\Mini');
        $option1 = new Decorator\Ipad\Storage16gb($device);
        $option2 = new Decorator\Ipad\MobileData($option1);
        
        $price = $device->getPrice() + Decorator\Ipad\Storage16gb::DEFAULT_PRICE + Decorator\Ipad\MobileData::DEFAULT_PRICE;
        $this->assertEquals($price, $option2->getPrice());
    }
    
    public function testIpadMiniWith32gbAndMobileData()
    {
        $device = $this->deviceFactory('Ipad\Mini');
        $option1 = new Decorator\Ipad\Storage32gb($device);
        $option2 = new Decorator\Ipad\MobileData($option1);
        
        $price = $device->getPrice() + Decorator\Ipad\Storage32gb::DEFAULT_PRICE + Decorator\Ipad\MobileData::DEFAULT_PRICE;
        $this->assertEquals($price, $option2->getPrice());
    }
    
    public function testIpadMiniWith64gbAndMobileData()
    {
        $device = $this->deviceFactory('Ipad\Mini');
        $option1 = new Decorator\Ipad\Storage64gb($device);
        $option2 = new Decorator\Ipad\MobileData($option1);
        
        $price = $device->getPrice() + Decorator\Ipad\Storage64gb::DEFAULT_PRICE + Decorator\Ipad\MobileData::DEFAULT_PRICE;
        $this->assertEquals($price, $option2->getPrice());
    }

    public function testIphoneSixWith16gbTest()
    {
        $device = $this->deviceFactory('Iphone\Six');
        $option = new Decorator\Iphone\Storage16gb($device);
        
        $this->assertEquals(
            $device->getPrice() + Decorator\Iphone\Storage16gb::DEFAULT_PRICE, 
            $option->getPrice()
        );
    }
    
    public function testIphoneSixWith32gbTest()
    {
        $device = $this->deviceFactory('Iphone\Six');
        $option = new Decorator\Iphone\Storage32gb($device);
        
        $this->assertEquals(
            $device->getPrice() + Decorator\Iphone\Storage32gb::DEFAULT_PRICE, 
            $option->getPrice()
        );
    }
    
    public function testIphoneSixWith64gbTest()
    {
        $device = $this->deviceFactory('Iphone\Six');
        $option = new Decorator\Iphone\Storage64gb($device);
        
        $this->assertEquals(
            $device->getPrice() + Decorator\Iphone\Storage64gb::DEFAULT_PRICE, 
            $option->getPrice()
        );
    }
    
    /**
     * 
     * @param type $type
     * @param type $screenWidth
     * @param type $screenHeight
     * @return AbstractAppleHandheld
     */
    private function deviceFactory($type, $screenWidth = 320, $screenHeight = 480)
    {
        $screen = new Apple\Screen($screenWidth, $screenHeight);
        $ns = '\Arjf\Devices\Handheld\Apple\\' . $type;
        return new $ns($screen);
    }
}
