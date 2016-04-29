<?php
namespace Arjf\DesignPatterns\Behavioural\Command;

class Warehouse
{
    /**
     * @var int
     */
    protected $iphoneSoldCount = 0;

    /**
     * @var int
     */
    protected $ipadSoldCount = 0;

    /**
     * increments the iphone sold count
     */
    public function purchasedIphone()
    {
        $this->iphoneSoldCount++;
    }

    /**
     * increments the ipad sold count
     */
    public function purchasedIpad()
    {
        $this->ipadSoldCount++;
    }

    /**
     * returns the amount of iphones sold
     *
     * @return int
     */
    public function getIphonePurchasedCount()
    {
        return $this->iphoneSoldCount;
    }

    /**
     * returns the amount of ipads sold
     *
     * @return int
     */
    public function getIpadPurchasedCount()
    {
        return $this->ipadSoldCount;
    }
}
