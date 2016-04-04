<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class Alphanumeric extends AbstractHandler {

    const MESSAGE = 'Subject not alphanumeric';

    /**
     * @return string
     */
    public function getMessage()
    {
        return static::MESSAGE;
    }
    
}
