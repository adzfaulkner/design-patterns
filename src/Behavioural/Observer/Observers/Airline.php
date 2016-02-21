<?php
namespace Arjf\DesignPatterns\Behavioural\Observer\Observers;

class Airline implements \SplObserver {
    use UpdatedTrait;
    
    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        //book the flight on behalf of the customer
        $this->setUpdated(true);
    }    
}
