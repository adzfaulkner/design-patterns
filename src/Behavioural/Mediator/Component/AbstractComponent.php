<?php
namespace Arjf\DesignPatterns\Behavioural\Mediator\Component;
use Arjf\DesignPatterns\Behavioural\Mediator\Broker;

abstract class AbstractComponent {

    /**
     * @var Broker
     */
    protected $broker;

    /*
     * Broker
     */
    public function __construct(Broker $broker)
    {
        $this->broker = $broker;
        $this->registerWithBroker();
    }

    /**
     * 
     */
    abstract protected function registerWithBroker();
}
