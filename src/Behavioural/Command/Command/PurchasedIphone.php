<?php
namespace Arjf\DesignPatterns\Behavioural\Command\Command;

class PurchasedIphone extends AbstractCommand
{
    /**
     * invokes the approriate warehouse method that an iphone has been sold
     */
    public function execute()
    {
        $this->warehouse->purchasedIphone();
    }
}

