<?php
namespace Arjf\DesignPatterns\Behavioural\Visitor\Handheld;

use Arjf\Devices\Handheld\Apple\Iphone\SixPlus as ParentSixPlus;

class SixPlus extends ParentSixPlus implements AcceptInterface
{
    use AcceptTrait;
}
