<?php
namespace Arjf\DesignPatterns\Behavioural\Observer\Observers;

class Accomodation implements \SplObserver {
    use UpdatedTrait;
    
    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        //book the hotel on behalf of the customer
        $this->setUpdated(true);
    }    
}
