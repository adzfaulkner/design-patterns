<?php
namespace Arjf\DesignPatterns\Behavioural\Observer\Observers;

class ConfirmationEmail implements \SplObserver {
    use UpdatedTrait;
    
    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        // send an confirmation email to the customer
        $this->setUpdated(true);
    }    
}
