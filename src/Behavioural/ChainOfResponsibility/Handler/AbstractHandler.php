<?php
namespace Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

use Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator\ValidatorInterface;

abstract class AbstractHandler
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var self
     */
    protected $nextHandler;

    /**
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param self $handler
     */
    public function setNextHandler(self $handler)
    {
        $this->nextHandler = $handler;
    }

    /**
     * @param mixed $subject
     */
    public function process($subject)
    {
        if ($this->validator->isValid($subject) === false) {
            return $this->getMessage();
        }

        if (empty($this->nextHandler) === true) {
            return null;
        }

        return $this->nextHandler->process($subject);
    }

    /**
     * @return string
     */
    abstract public function getMessage();
}