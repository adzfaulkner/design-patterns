<?php
namespace Arjf\DesignPatterns\Behavioural\State;
use Arjf\DesignPatterns\Behavioural\State\Step;

class Application
{

    /**
     * @var Step\AbstractStep
     */
    protected $currentStep;

    /**
     * @var Step\Personal
     */
    protected $personalStep;

    /**
     * @var Step\Income
     */
    protected $incomeStep;

    /**
     * @var Step\Outgoing
     */
    protected $outgoingStep;

    /**
     * @var Step\Confirmation
     */
    protected $confirmationStep;

    /**
     * @var Step\Complete
     */
    protected $completeStep;

    /**
     * @param Step\Personal $personalStep
     * @param Step\Income $incomeStep
     * @param Step\Outgoing $outgoingStep
     * @param Step\Confirmation $confirmationStep
     * @param Step\Complete $completeStep
     */
    public function __construct(
        Step\Personal $personalStep,
        Step\Income $incomeStep,
        Step\Outgoing $outgoingStep,
        Step\Confirmation $confirmationStep,
        Step\Complete $completeStep
    )
    {
        $personalStep->setApplication($this);
        $incomeStep->setApplication($this);
        $outgoingStep->setApplication($this);
        $confirmationStep->setApplication($this);
        $completeStep->setApplication($this);

        $this->personalStep = $personalStep;
        $this->incomeStep = $incomeStep;
        $this->outgoingStep = $outgoingStep;
        $this->confirmationStep = $confirmationStep;
        $this->completeStep = $completeStep;
        $this->currentStep = $personalStep;
    }

    /**
     * @return Step\Personal
     */
    public function getPersonalStep()
    {
        return $this->personalStep;
    }

    /**
     * @return Step\Income
     */
    public function getIncomeStep()
    {
        return $this->incomeStep;
    }

    /**
     * @return Step\Outgoing
     */
    public function getOutgoingStep()
    {
        return $this->outgoingStep;
    }

    /**
     * @return Step\Confirmation
     */
    public function getConfirmationStep()
    {
        return $this->confirmationStep;
    }

    /**
     * @return Step\Complete
     */
    public function getCompleteStep()
    {
        return $this->completeStep;
    }

    /**
     * @var Step\AbstractStep $currentStep
     * @return $this
     */
    public function setCurrentStep(Step\AbstractStep $currentStep)
    {
        $this->currentStep = $currentStep;
        return $this;
    }

    /**
     * @return Step\AbstractStep
     */
    public function getCurrentStep()
    {
        return $this->currentStep;
    }

}
