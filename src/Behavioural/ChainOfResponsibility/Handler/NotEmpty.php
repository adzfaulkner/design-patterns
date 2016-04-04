<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class NotEmpty extends AbstractHandler {

    const MESSAGE = 'Subject is empty';

    /**
     * @return string
     */
    public function getMessage()
    {
        return static::MESSAGE;
    }

}
