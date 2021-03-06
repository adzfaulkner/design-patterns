<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator;
use \Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator\ValidatorInterface;

class IsAlphanumeric implements ValidatorInterface {

    /**
     * determines whether or not
     *
     * @param mixed $subject
     * @return bool
     */
    public function isValid($subject)
    {
        if (is_scalar($subject) === false) {
            return false;
        }

        return ctype_alnum($subject);
    }
    
}
