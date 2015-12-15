<?php
namespace Arjf\DesignPatterns\Structural\Composite;

class Items implements ItemInterface { 
   /**
     * @var array 
     */
    protected $items = array();
    
    /**
     * 
     * @param \Arjf\DesignPatterns\Structural\Composite\Item $item
     * @return \Arjf\DesignPatterns\Structural\Composite\Items
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getCost()
    {
        $cost = 0;
        foreach ($this->items as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }  
} 

