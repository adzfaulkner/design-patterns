<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class Int extends AbstractHandler {

    const MESSAGE = 'Subject not an int';

    /**
     * @return string
     */
    public function getMessage()
    {
        return static::MESSAGE;
    }

}
