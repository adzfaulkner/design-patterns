<?php
namespace Arjf\DesignPatterns\Behavioural\State\Step;

class Complete extends AbstractStep
{

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return true;
    }

    /**
     * @throws \LogicException
     */
    public function complete()
    {
        throw new \LogicException('Application already complete');
    }

}
