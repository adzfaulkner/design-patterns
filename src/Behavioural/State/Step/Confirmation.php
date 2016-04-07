<?php
namespace Arjf\DesignPatterns\Behavioural\State\Step;

class Confirmation extends AbstractStep
{

    /**
     * @var bool
     */
    protected $signed;
    
    /**
     * @var bool
     */
    protected $acceptedTandCs;

    /**
     * @return bool
     */
    public function hasSigned()
    {
        return $this->signed === true;
    }

    /**
     * @return bool
     */
    public function hasAcceptedTandCs()
    {
        return $this->acceptedTandCs === true;
    }

    /**
     * @param bool $signed
     * @return $this
     */
    public function setSigned($signed)
    {
        $this->signed = $signed;
        return $this;
    }

    /**
     * @param bool $acceptedTandCs
     * @return $this
     */
    public function setAcceptedTandCs($acceptedTandCs)
    {
        $this->acceptedTandCs = $acceptedTandCs;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->hasAcceptedTandCs() !== true || $this->hasSigned() !== true;
    }

    /**
     * @return bool
     */
    public function complete()
    {
        $this->application->setCurrentStep($this->application->getCompleteStep());
        return true;
    }
    
}
