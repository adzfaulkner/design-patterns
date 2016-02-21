<?php
namespace Arjf\DesignPatterns\Behavioural\Observer;

class Customer 
{
    
    /**
     *
     * @var string
     */
    private $firstName;
    
    /**
     *
     * @var string
     */
    private $surname;
    
    /**
     *
     * @var string
     */
    private $email;
    
    /**
     * 
     * @param string $firstName
     * @param string $surname
     * @param string $email
     */
    public function __construct($firstName, $surname, $email)
    {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
    }

    
    /**
     * 
     * @return string
     */
    public function getFirstName() 
    {
        return $this->firstName;
    }

    /**
     * 
     * @return string
     */
    public function getSurname() 
    {
        return $this->surname;
    }

    /**
     * 
     * @return string
     */
    public function getEmail() 
    {
        return $this->email;
    }
}