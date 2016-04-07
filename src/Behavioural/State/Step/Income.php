<?php
namespace Arjf\DesignPatterns\Behavioural\State\Step;

class Income extends AbstractStep
{

    /**
     * @var foat
     */
    protected $netIncome;
    
    /**
     * @var string
     */
    protected $frequency;

    /**
     * @return float
     */
    public function getNetIncome()
    {
        return $this->netIncome;
    }

    /**
     * @return string
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param float $netIncome
     * @return $this
     */
    public function setNetIncome($netIncome)
    {
        $this->netIncome = $netIncome;
        return $this;
    }

    /**
     * @param string $frequency
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->frequency === null || $this->netIncome === null;
    }
    
    /**
     * @return bool
     */
    public function complete()
    {
        $this->application->setCurrentStep($this->application->getOutgoingStep());
        return true;
    }

}
