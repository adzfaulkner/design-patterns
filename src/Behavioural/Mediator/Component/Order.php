<?php
namespace Arjf\DesignPatterns\Behavioural\Mediator\Component;

class Order extends AbstractComponent  {

    const STATUS_SHIPPED = 'orderShipped';

    const STATUS_COMPLETE = 'orderComplete';

    /**
     * @return mixed
     */
    public function orderComplete()
    {
        return array_merge(
            array(self::STATUS_COMPLETE),
            $this->broker->orderComplete()
        );
    }

    /**
     * @return mixed
     */
    public function orderShipped()
    {
        return self::STATUS_SHIPPED;
    }

    /**
     *
     */
    protected function registerWithBroker()
    {
        $this->broker->setOrder($this);
    }
}
