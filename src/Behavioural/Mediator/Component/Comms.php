<?php
namespace Arjf\DesignPatterns\Behavioural\Mediator\Component;

class Comms extends AbstractComponent {

    const STATUS_EMAIL_ORDER_PROCESSED_SENT = 'emailOrderProcessedSent';

    const STATUS_EMAIL_ORDER_SHIPPED_SENT = 'emailOrderShippedSent';

    /**
     * @return mixed
     */
    public function sendEmailOrderProcessed()
    {
        return self::STATUS_EMAIL_ORDER_PROCESSED_SENT;
    }

    /**
     * @return mixed
     */
    public function sendEmailOrderShipped()
    {
        return self::STATUS_EMAIL_ORDER_SHIPPED_SENT;
    }

    /**
     *
     */
    protected function registerWithBroker()
    {
        $this->broker->setComms($this);
    }

}
