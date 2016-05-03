<?php
namespace Arjf\DesignPatterns\Behavioural\Visitor\Handheld;

use Arjf\Devices\Handheld\Apple\Iphone\Six as ParentSix;

class Six extends ParentSix implements AcceptInterface
{
    use AcceptTrait;
}
