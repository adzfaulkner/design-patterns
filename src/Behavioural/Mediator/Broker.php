<?php
namespace Arjf\DesignPatterns\Behavioural\Mediator;
use Arjf\DesignPatterns\Behavioural\Mediator\Component;

class Broker {

    /**
     * @var Component\Comms
     */
    private $comms;

    /**
     * @var Component\Order
     */
    private $order;

    /**
     * @var Component\Payment
     */
    private $payment;

    /**
     * @var Component\Warehouse
     */
    private $warehouse;

    /**
     * @return array
     */
    public function orderComplete()
    {
        return [
            $this->warehouse->prepareOrder(),
            $this->payment->preAuth(),
            $this->comms->sendEmailOrderProcessed(),
        ];
    }

    /**
     * @return array
     */
    public function orderFulfilled()
    {
        return [
            $this->payment->fulfill(),
            $this->order->orderShipped(),
            $this->comms->sendEmailOrderShipped(),
        ];
    }

    /**
     * @param Component\Comms $comms
     * @return $this
     */
    function setComms(Component\Comms $comms)
    {
        $this->comms = $comms;
        return $this;
    }

    /**
     * @param Order $order
     * @return $this
     */
    function setOrder(Component\Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @var Payment
     * @return $this
     */
    function setPayment(Component\Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @var Warehouse
     * @return $this
     */
    function setWarehouse(Component\Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
        return $this;
    }
    
}
