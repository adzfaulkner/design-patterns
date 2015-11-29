<?php
namespace Arjf\DesignPatterns\Creational\Builder\Ipad;
use Arjf\DesignPatterns\Creational\Builder\AbstractBuilder;
use \Arjf\Devices\Handheld\Apple\AbstractIpad;

class Builder extends AbstractBuilder {
    /**
     * 
     * @param AbstractIpad $device
     */
    public function __construct(AbstractIpad $device)
    {
        parent::__construct($device);
    }
    
    /**
     * 
     * @return AbstractIpad
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