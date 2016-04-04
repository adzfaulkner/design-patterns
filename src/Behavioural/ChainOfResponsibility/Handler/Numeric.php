<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class Numeric extends AbstractHandler {

    const MESSAGE = 'Subject not numeric';

    /**
     * @return string
     */
    public function getMessage()
    {
        return static::MESSAGE;
    }

}
