<?php
use Arjf\Devices\Handheld\Apple\Screen;
use Arjf\Devices\Handheld\Apple\Iphone\Six as IphoneSix;
use Arjf\DesignPatterns\Creational\Builder\Iphone\Builder as IphoneBuilder;
use Arjf\DesignPatterns\Creational\Builder\Iphone\Director as IphoneDirector;
use Arjf\Devices\Handheld\Apple\Ipad\Mini as IpadMini;
use Arjf\DesignPatterns\Creational\Builder\Ipad\Builder as IpadBuilder;
use Arjf\DesignPatterns\Creational\Builder\Ipad\Director as IpadDirector;

class BuilderTest extends PHPUnit_Framework_TestCase {
    public function testIphoneSixBuild()
    {
        $screen = new Screen(320, 480);
        $device = new IphoneSix($screen);
        
        $builder = new IphoneBuilder($device);
        $director = new IphoneDirector();
        $result = $director->build($builder);
        
        $this->assertInstanceOf('Arjf\Devices\Handheld\Apple\Iphone\Six', $result);
    }
    
    public function testIpadMiniBuild()
    {
        $screen = new Screen(1024, 768);
        $device = new IpadMini($screen);
        
        $builder = new IpadBuilder($device);
        $director = new IpadDirector();
        $result = $director->build($builder);
        
        $this->assertInstanceOf('Arjf\Devices\Handheld\Apple\Ipad\Mini', $result);
    }
}
