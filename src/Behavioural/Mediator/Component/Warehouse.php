<?php
namespace Arjf\DesignPatterns\Behavioural\Mediator\Component;

class Warehouse extends AbstractComponent {

    const STATUS_INPROGRESS = 'warehouseInProgress';

    const STATUS_SHIPPED = 'warehouseShipped';

    /**
     * @return mixed
     */
    public function prepareOrder()
    {
        return self::STATUS_INPROGRESS;
    }

    /**
     * @return mixed
     */
    public function orderShipped()
    {
        return array_merge(
            array(self::STATUS_SHIPPED),
            $this->broker->orderFulfilled()
        );
    }

    /**
     *
     */
    protected function registerWithBroker()
    {
        $this->broker->setWarehouse($this);
    }

}
