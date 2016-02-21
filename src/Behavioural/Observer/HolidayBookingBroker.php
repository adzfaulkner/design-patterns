<?php
namespace Arjf\DesignPatterns\Behavioural\Observer;

class HolidayBookingBroker implements \SplSubject 
{
    
    /**
     * observers.
     *
     * @var \SplObjectStorage
     */
    protected $observers;
    
    /**
     *
     * @var Customer
     */
    protected $customer;

    /**
     * 
     * @param \Arjf\DesignPatterns\Behavioural\Observer\Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->observers = new \SplObjectStorage();
    }

    /**
     * attach a new observer.
     *
     * @param \SplObserver $observer
     *
     * @return \Arjf\DesignPatterns\Behavioural\Observer\HolidayBookingBroker
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
        return $this;
    }

    /**
     * detach an observer.
     *
     * @param \SplObserver $observer
     *
     * @return \Arjf\DesignPatterns\Behavioural\Observer\HolidayBookingBroker
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
        return $this;
    }

    /**
     * notify observers.
     *
     * @return \Arjf\DesignPatterns\Behavioural\Observer\HolidayBookingBroker
     */
    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
        
        return $this;
    }
    
    /**
     * 
     * @return \Arjf\DesignPatterns\Behavioural\Observer\HolidayBookingBroker
     */
    public function makeBooking()
    {
        return $this->notify();
    }
    
    /**
     * 
     * @return Customer
     */
    public function getCustomer() {
        return $this->customer;
    }
    
}