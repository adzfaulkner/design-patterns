<?php
use Arjf\DesignPatterns\Creational\AbstractFactory;

class AbstractFactoryTest extends PHPUnit_Framework_TestCase {
    public function testIphoneCreateBody()
    {
        $factory = new AbstractFactory\Iphone\Factory();
        $iPhoneBody = $factory->createBody();
        $this->assertInstanceOf('Arjf\DesignPatterns\Creational\AbstractFactory\Iphone\Body', $iPhoneBody);
        $this->assertEquals($iPhoneBody->getBodyParts(), "here are the iPhone body parts");
    }
    
    public function testIpadCreateBody()
    {
        $factory = new AbstractFactory\Ipad\Factory();
        $iPadBody = $factory->createBody();
        $this->assertInstanceOf('Arjf\DesignPatterns\Creational\AbstractFactory\Ipad\Body', $iPadBody);
        $this->assertEquals($iPadBody->getBodyParts(), "here are the iPad body parts");
    }
    
    public function testIphoneCreateScreen()
    {
        $factory = new AbstractFactory\Iphone\Factory();
        $iPhoneScreen = $factory->createScreen();
        $this->assertInstanceOf('Arjf\DesignPatterns\Creational\AbstractFactory\Iphone\Screen', $iPhoneScreen);
        $this->assertEquals($iPhoneScreen->getScreenParts(), "here are the iPhone screen parts");
    }
    
    public function testIpadCreateScreen()
    {
        $factory = new AbstractFactory\Ipad\Factory();
        $iPadScreen = $factory->createScreen();
        $this->assertInstanceOf('Arjf\DesignPatterns\Creational\AbstractFactory\Ipad\Screen', $iPadScreen);
        $this->assertEquals($iPadScreen->getBodyParts(), "here are the iPad screen parts");
    }
    
    public function testIphoneCreateCamera()
    {
        $factory = new AbstractFactory\Iphone\Factory();
        $iPhoneCamera = $factory->createCamera();
        $this->assertInstanceOf('Arjf\DesignPatterns\Creational\AbstractFactory\Iphone\Camera', $iPhoneCamera);
        $this->assertEquals($iPhoneCamera->getCameraParts(), "here are the iPhone camera parts");
    }
    
    public function testIpadCreateCamera()
    {
        $factory = new AbstractFactory\Ipad\Factory();
        $iPadCamera = $factory->createCamera();
        $this->assertInstanceOf('Arjf\DesignPatterns\Creational\AbstractFactory\Ipad\Camera', $iPadCamera);
        $this->assertEquals($iPadCamera->getCameraParts(), "here are the iPad camera parts");
    }
}
