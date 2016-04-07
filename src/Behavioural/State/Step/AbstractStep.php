<?php
namespace Arjf\DesignPatterns\Behavioural\State\Step;
use Arjf\DesignPatterns\Behavioural\State\Application;

abstract class AbstractStep
{

    /**
     * @var Application
     */
    protected $application;
    
    public function setApplication(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @return bool
     */
    abstract public function complete();

    /**
     * @return bool
     */
    abstract public function isEmpty();

}
