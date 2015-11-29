<?php
namespace Arjf\DesignPatterns\Creational\Builder\Iphone;
use Arjf\DesignPatterns\Creational\Builder\AbstractBuilder;
use Arjf\Devices\Handheld\Apple\AbstractIphone;

class Builder extends AbstractBuilder {
    /**
     * 
     * @param AbstractIphone $device
     */
    public function __construct(AbstractIphone $device)
    {
        parent::__construct($device);
    }
    
    /**
     * 
     * @return AbstractIphone
     */
    public function getDevice()
    {
        return parent::getDevice();
    }
    
    public function buildScreen() {
        
    }
    
    public function buildCamera() {
        
    }
    
    public function buildShell() {
        
    }
    
    public function buildAuxOut() {
        
    }
}