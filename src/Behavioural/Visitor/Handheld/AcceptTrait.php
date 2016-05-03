<?php
namespace Arjf\DesignPatterns\Behavioural\Visitor\Handheld;

use Arjf\DesignPatterns\Behavioural\Visitor\Visitor\VisitorInterface;

trait AcceptTrait
{
    /**
     * Implemented class accepts an visitor
     *
     * @param VisitorInterface $visitor
     * @return $this
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visit($this);
        return $this;
    }

}
