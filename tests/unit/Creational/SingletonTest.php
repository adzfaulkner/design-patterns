<?php
use Arjf\DesignPatterns\Creational\Singleton\Instance;

class SingletonTest extends PHPUnit_Framework_TestCase {
    public function testSameInstance()
    {
        $instance = Instance::getInstance();
        $instance2 = Instance::getInstance();
        $this->assertSame($instance, $instance2);
    }
}
