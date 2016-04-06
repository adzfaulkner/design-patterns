<?php
namespace Arjf\DesignPatterns\Behavioural\Mediator\Component;

class Payment extends AbstractComponent  {

    const STATUS_FULFILLED = 'paymentFulfilled';

    const STATUS_PREAUTH = 'paymentPreAuth';
    
    /**
     * @return mixed
     */
    public function preAuth()
    {
        return self::STATUS_PREAUTH;
    }

    /**
     * @return mixed
     */
    public function fulfill()
    {
        return self::STATUS_FULFILLED;
    }

    /**
     *
     */
    protected function registerWithBroker()
    {
        $this->broker->setPayment($this);
    }

}
