<?php
namespace Arjf\DesignPatterns\Behavioural\Command\Command;

interface CommandInterface
{
    /**
     * required so that invoker can execute this method
     */
    public function execute();
}
