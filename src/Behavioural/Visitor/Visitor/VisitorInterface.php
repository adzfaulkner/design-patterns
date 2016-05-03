<?php
namespace Arjf\DesignPatterns\Behavioural\Visitor\Visitor;

use Arjf\Devices\Handheld\AbstractAppleHandheld;

interface VisitorInterface
{
    /**
     * Allows the implement class to visit a handheld
     *
     * @param AbstractAppleHandheld $handheld
     */
    public function visit(AbstractAppleHandheld $handheld);
}
