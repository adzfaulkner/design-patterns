<?php
use Arjf\DesignPatterns\Structural\Composite;

class CompositeTest extends PHPUnit_Framework_TestCase {
    public function testItem()
    {
        $item = new Composite\Item('Testing', 1.00);
        $this->assertEquals('Testing', $item->getDescription());
        $this->assertEquals(1.00, $item->getCost());
        $this->assertEquals('Testing costs: 1.00', (string) $item);
    }
    
    public function testItemCost3decimals()
    {
        $item = new Composite\Item('Testing', 1.007);
        $this->assertEquals('Testing', $item->getDescription());
        $this->assertEquals(1.007, $item->getCost());
        $this->assertEquals('Testing costs: 1.01', (string) $item);
    }
    
    public function testItems()
    {
        $item = new Composite\Item('Testing', 1.00);
        $item2 = new Composite\Item('Testing', 1.00);
        $items = new Composite\Items();
        $items->addItem($item)
            ->addItem($item2);
        $this->assertEquals(2.00, $items->getCost());
    }
    
    public function testMinusCostItems()
    {
        $item = new Composite\Item('Testing', -1.00);
        $item2 = new Composite\Item('Testing', -1.00);
        $items = new Composite\Items();
        $items->addItem($item)
            ->addItem($item2);
        $this->assertEquals(-2.00, $items->getCost());
    }
    
    public function testNonNumberCostItems()
    {
        $item = new Composite\Item('Testing', 'bo');
        $item2 = new Composite\Item('Testing', 'bo');
        $items = new Composite\Items();
        $items->addItem($item)
            ->addItem($item2);
        $this->assertEquals(0.00, $items->getCost());
    }
}
