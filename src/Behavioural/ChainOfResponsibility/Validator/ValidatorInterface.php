<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator;

interface ValidatorInterface
{
    /**
     * @param mixed $subject
     * @return bool
     */
    public function isValid($subject);
}