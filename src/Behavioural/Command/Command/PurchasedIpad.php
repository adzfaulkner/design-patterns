<?php
namespace Arjf\DesignPatterns\Behavioural\Command\Command;

class PurchasedIpad extends AbstractCommand
{
    /**
     * invokes the approriate warehouse method that an ipad has been sold
     */
    public function execute()
    {
        $this->warehouse->purchasedIpad();
    }
}

