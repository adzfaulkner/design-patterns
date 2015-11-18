<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Iphone;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Factory extends AbstractFactory\AbstractDeviceFactory 
{
    public function createBody()
    {
        return new Body();
    }
    
    public function createCamera()
    {
        return new Camera();
    }
    
    public function createScreen()
    {
        return new Screen();
    }
}
