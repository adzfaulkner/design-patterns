<?php
namespace Arjf\DesignPatterns\Creational\Builder;
use Arjf\Devices\Handheld\AbstractAppleHandheld;

abstract class AbstractBuilder {
    /**
     *
     * @var AbstractAppleHandheld
     */
    protected $device;
    
    public function __construct(AbstractAppleHandheld $device)
    {
        $this->device = $device;
    }
    
    /**
     * 
     * @return AbstractAppleHandheld
     */
    public function getDevice()
    {
        return $this->device;
    }
    
    abstract public function buildScreen();
    abstract public function buildCamera();
    abstract public function buildShell();
    abstract public function buildAuxOut();
}