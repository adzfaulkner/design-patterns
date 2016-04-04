<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class String extends AbstractHandler {

    const MESSAGE = 'Subject not a string';

    /**
     * @return string
     */
    public function getMessage()
    {
        return static::MESSAGE;
    }

}
