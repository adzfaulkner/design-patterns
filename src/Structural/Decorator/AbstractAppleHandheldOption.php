<?php
namespace Arjf\DesignPatterns\Structural\Decorator;
use Arjf\Devices\Handheld\AbstractAppleHandheld;

abstract class AbstractAppleHandheldOption extends AbstractAppleHandheld
{ 
    const DEFAULT_PRICE = 0.00;
    
    /**
     * @var AbstractAppleHandheld
     */
    protected $device;
    
    /**
     * @param AbstractAppleHandheld $device
     */
    public function __construct(AbstractAppleHandheld $device)
    {
        parent::__construct(
            $device->getScreen(), 
            $device->getColour(), 
            $device->getCapacity(),
            static::DEFAULT_PRICE
        );
        
        $this->device = $device;
    }
    
    /**
     * 
     * @return float
     */
    public function getPrice()
    {
        return $this->device->getPrice() + $this->price;
    }
} 

