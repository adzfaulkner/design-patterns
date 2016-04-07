<?php
use Arjf\DesignPatterns\Behavioural\Iterator\Collection;
use Arjf\Devices\Handheld\Apple\Iphone\Six;
use Arjf\Devices\Handheld\Apple\Screen;
use Arjf\Devices\Handheld\Apple\Iphone\SixPlus;

class ValidatorTest extends PHPUnit_Framework_TestCase
{

    public function testCollection()
    {
        $screen = new Screen(320, 480);
        $device1 = new Six($screen);
        $device2 = new SixPlus($screen);
        
        $collection = new Collection(array(
            $device1,
            $device2
        ));
        
        $this->assertEquals(2, $collection->count());
        $this->assertInstanceOf('\Arjf\Devices\Handheld\Apple\Iphone\Six', $collection->current());
        $collection->next();
        $this->assertInstanceOf('\Arjf\Devices\Handheld\Apple\Iphone\SixPlus', $collection->current());
    }
}
