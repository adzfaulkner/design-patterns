<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator;
use \Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator\ValidatorInterface;

class IsNotEmpty implements ValidatorInterface {

    /**
     * determines whether or not
     *
     * @param mixed $subject
     * @return bool
     */
    public function isValid($subject)
    {
        return empty($subject) === false;
    }
    
}
