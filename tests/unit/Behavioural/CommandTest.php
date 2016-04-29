<?php
use Arjf\DesignPatterns\Behavioural\Command\Warehouse;
use Arjf\DesignPatterns\Behavioural\Command\Command\PurchasedIpad;
use Arjf\DesignPatterns\Behavioural\Command\Command\PurchasedIphone;

class CommandTest extends PHPUnit_Framework_TestCase
{    
    /**
     * @var Warehouse
     */
    protected $warehouse;

    public function setUp()
    {
        $this->warehouse = new Warehouse();
    }

    public function testWarehouseIpadPurchased()
    {
        $receiver = $this->warehouse;
        $receiver->purchasedIpad();
        $this->assertEquals(1, $receiver->getIpadPurchasedCount());
        $this->assertEquals(0, $receiver->getIphonePurchasedCount());
        $receiver->purchasedIpad();
        $this->assertEquals(2, $receiver->getIpadPurchasedCount());
        $this->assertEquals(0, $receiver->getIphonePurchasedCount());
    }

    public function testWarehouseIphonePurchased()
    {
        $receiver = $this->warehouse;
        $receiver->purchasedIphone();
        $this->assertEquals(0, $receiver->getIpadPurchasedCount());
        $this->assertEquals(1, $receiver->getIphonePurchasedCount());
        $receiver->purchasedIphone();
        $this->assertEquals(0, $receiver->getIpadPurchasedCount());
        $this->assertEquals(2, $receiver->getIphonePurchasedCount());
    }

    public function testCommandPurchasedIpad()
    {
        $receiver = $this->warehouse;
        $command = new PurchasedIpad($receiver);
        $command->execute();
        $this->assertEquals(1, $receiver->getIpadPurchasedCount());
        $this->assertEquals(0, $receiver->getIphonePurchasedCount());
        $command->execute();
        $this->assertEquals(2, $receiver->getIpadPurchasedCount());
        $this->assertEquals(0, $receiver->getIphonePurchasedCount());
    }

    public function testCommandPurchasedIphone()
    {
        $receiver = $this->warehouse;
        $command = new PurchasedIphone($receiver);
        $command->execute();
        $this->assertEquals(0, $receiver->getIpadPurchasedCount());
        $this->assertEquals(1, $receiver->getIphonePurchasedCount());
        $command->execute();
        $this->assertEquals(0, $receiver->getIpadPurchasedCount());
        $this->assertEquals(2, $receiver->getIphonePurchasedCount());
    }
}
