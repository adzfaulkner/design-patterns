<?php
use Arjf\DesignPatterns\Behavioural\Observer;
use Arjf\DesignPatterns\Behavioural\Observer\Observers;

class ObserverTest extends PHPUnit_Framework_TestCase {
    
    public function testCustomer()
    {
        $customer = $this->customerFactory();
        $this->assertEquals('Joe', $customer->getFirstName());
        $this->assertEquals('Bloggs', $customer->getSurname());
        $this->assertEquals('jbloggs@test.com', $customer->getEmail());
    }
    
    public function testOneObservers()
    {
        $accomodation = new Observers\Accomodation();
        $customer = $this->customerFactory();
        $broker = new Observer\HolidayBookingBroker($customer);
        $broker->attach($accomodation);
        $broker->makeBooking();
        $this->assertTrue($accomodation->isUpdated());
    }
    
    public function testTwoObservers()
    {
        $accomodation = new Observers\Accomodation();
        $airline = new Observers\Airline();
        $customer = $this->customerFactory();
        $broker = new Observer\HolidayBookingBroker($customer);
        $broker->attach($accomodation)
                ->attach($airline)
                ->makeBooking();
        $this->assertTrue($accomodation->isUpdated());
        $this->assertTrue($airline->isUpdated());
    }
    
    public function testThreeObservers()
    {
        $accomodation = new Observers\Accomodation();
        $airline = new Observers\Airline();
        $email = new Observers\ConfirmationEmail();
        $customer = $this->customerFactory();
        $broker = new Observer\HolidayBookingBroker($customer);
        $broker->attach($accomodation)
                ->attach($airline)
                ->attach($email)
                ->makeBooking();
        $this->assertTrue($accomodation->isUpdated());
        $this->assertTrue($airline->isUpdated());
        $this->assertTrue($email->isUpdated());
    }
    
    public function testDetachObserver()
    {
                $accomodation = new Observers\Accomodation();
        $airline = new Observers\Airline();
        $email = new Observers\ConfirmationEmail();
        $customer = $this->customerFactory();
        $broker = new Observer\HolidayBookingBroker($customer);
        $broker->attach($accomodation)
                ->attach($airline)
                ->attach($email)
                ->detach($accomodation)
                ->makeBooking();
        $this->assertFalse($accomodation->isUpdated());
        $this->assertTrue($airline->isUpdated());
        $this->assertTrue($email->isUpdated());
    }
    
    private function customerFactory()
    {
        return new Observer\Customer('Joe', 'Bloggs', 'jbloggs@test.com');
    }
    
}
