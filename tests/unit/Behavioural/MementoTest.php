<?php
use Arjf\DesignPatterns\Behavioural\State;
use Arjf\DesignPatterns\Behavioural\State\Step;
use Arjf\DesignPatterns\Behavioural\Memento;

class MementoTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Memento\History
     */
    protected static $memento;

    /**
     * @var State\Application
     */
    protected static $application;

    public static function setUpBeforeClass()
    {
        self::$application = new State\Application(
            new Step\Personal(),
            new Step\Income(),
            new Step\Outgoing(),
            new Step\Confirmation(),
            new Step\Complete()
        );

        self::$memento = new Memento\History();
    }

    /**
     * @expectedException LogicException
     */
    public function testEmptyHistory()
    {
        $memento = self::$memento;
        $memento->restoreLast();
    }

    public function testSaveAndRestorePersonal()
    {
        $application = self::$application;
        $memento = self::$memento;

        $personal = $application->getCurrentStep();

        $personal->setSalutation('MR');

        $memento->saveState($application);
        
        $personal->complete();

        $previous = $memento->restoreLast();

        $this->assertInstanceOf('\Arjf\DesignPatterns\Behavioural\State\Step\Personal', $previous->getCurrentStep());
        $this->assertEquals('MR', $previous->getCurrentStep()->getSalutation());
    }

    public function testSaveAndRestoreIncome()
    {
        $application = self::$application;
        $memento = self::$memento;

        $income = $application->getCurrentStep();

        $income->setNetIncome(1000);

        $memento->saveState($application);

        $income->complete();

        $previous = $memento->restoreLast();

        $this->assertInstanceOf('\Arjf\DesignPatterns\Behavioural\State\Step\Income', $previous->getCurrentStep());
        $this->assertEquals(1000, $previous->getCurrentStep()->getNetIncome());
    }

}
