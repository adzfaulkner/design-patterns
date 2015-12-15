<?php
namespace Arjf\DesignPatterns\Structural\Composite;

class Item implements ItemInterface 
{ 
    /**
     * @var string 
     */
    protected $description;
    
    /**
     * @var float
     */
    protected $cost;
    
    /**
     * @param string $description
     * @param float $cost
     */
    public function __construct($description, $cost)
    {
        $this->description = $description;
        $this->cost = $cost;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }  
    
    /**
     * @return string
     */
    public function __toString() 
    {
        return $this->description . ' costs: ' . number_format($this->cost, 2, '.', '');
    }
} 

