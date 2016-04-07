<?php
namespace Arjf\DesignPatterns\Behavioural\State\Step;

class Outgoing extends AbstractStep
{

    /**
     * @var float
     */
    protected $rent;

    /**
     * @var float
     */
    protected $bills;

    /**
     * @var float
     */
    protected $other;

    /**
     * @return float
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * @return float
     */
    public function getBills()
    {
        return $this->bills;
    }

    /**
     * @return float
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * @param float $rent
     * @return $this
     */
    public function setRent($rent)
    {
        $this->rent = $rent;
        return $this;
    }

    /**
     * @param float $bills
     * @return $this
     */
    public function setBills($bills)
    {
        $this->bills = $bills;
        return $this;
    }

    /**
     * @param float $other
     * @return $this
     */
    public function setOther($other)
    {
        $this->other = $other;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->rent === null || $this->bills === null;
    }

    /**
     * @return bool
     */
    public function complete()
    {
        $this->application->setCurrentStep($this->application->getConfirmationStep());
        return true;
    }

}
