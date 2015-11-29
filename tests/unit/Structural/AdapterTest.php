<?php
use Arjf\DesignPatterns\Structural\Adapter\Iphone;

class AdapterTest extends PHPUnit_Framework_TestCase {
    public function testAdapter()
    {
        $screen = new Iphone\Screen\Screen(320, 480);
        $adapter = new Iphone\Screen\Adapter($screen);
        $this->assertEquals(320, $adapter->getWidth());
        $this->assertEquals(480, $adapter->getHeight());
        $this->assertFalse($adapter->isRetina());
    }
    
    public function testIphoneThree()
    {
        $screen = new Iphone\Screen\Screen(320, 480);
        $adapter = new Iphone\Screen\Adapter($screen);
        $iphone = new Iphone\Three($adapter);
        $this->assertSame($iphone->getScreen(), $adapter);
    }
}
