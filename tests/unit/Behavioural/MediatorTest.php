<?php
use Arjf\DesignPatterns\Behavioural\Mediator;
use Arjf\DesignPatterns\Behavioural\Mediator\Component;

class MediatorTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Mediator\Broker
     */
    public $broker;

    public function setUp()
    {
        $broker = new Mediator\Broker();

        $comms = new Component\Comms($broker);
        $payment = new Component\Payment($broker);

        $broker->setComms($comms)
            ->setPayment($payment);

        $this->broker = $broker;
    }

    public function testOrderComplete()
    {
        $broker = $this->broker;

        $order = new Component\Order($broker);

        $broker->setWarehouse(new Component\Warehouse($broker))
            ->setOrder($order);

        $result = $order->orderComplete();

        $this->assertCount(4, $result);
        $this->assertContains(Component\Warehouse::STATUS_INPROGRESS, $result);
        $this->assertContains(Component\Order::STATUS_COMPLETE, $result);
        $this->assertContains(Component\Payment::STATUS_PREAUTH, $result);
        $this->assertContains(Component\Comms::STATUS_EMAIL_ORDER_PROCESSED_SENT, $result);
    }

    public function testWarehouseShipped()
    {
        $broker = $this->broker;

        $warehouse = new Component\Warehouse($broker);

        $broker->setWarehouse($warehouse)
            ->setOrder(new Component\Order($broker));

        $result = $warehouse->orderShipped();

        $this->assertCount(4, $result);
        $this->assertContains(Component\Warehouse::STATUS_SHIPPED, $result);
        $this->assertContains(Component\Order::STATUS_SHIPPED, $result);
        $this->assertContains(Component\Payment::STATUS_FULFILLED, $result);
        $this->assertContains(Component\Comms::STATUS_EMAIL_ORDER_SHIPPED_SENT, $result);
    }
    
}
