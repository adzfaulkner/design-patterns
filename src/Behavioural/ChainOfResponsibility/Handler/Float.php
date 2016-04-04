<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class Float extends AbstractHandler {

    const MESSAGE = 'Subject not a float';

    /**
     * @return string
     */
    public function getMessage()
    {
        return static::MESSAGE;
    }

}
