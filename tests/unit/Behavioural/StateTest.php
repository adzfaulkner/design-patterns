<?php
use Arjf\DesignPatterns\Behavioural\State;
use Arjf\DesignPatterns\Behavioural\State\Step;

class StateTest extends PHPUnit_Framework_TestCase
{

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
    }

    public function testPersonalFill()
    {
        $application = self::$application;
        $personal = $application->getCurrentStep();

        $this->assertSame($application->getPersonalStep(), $personal);
        $this->assertTrue($personal->isEmpty());

        $personal->setFirstname('test')
            ->setSurname('test')
            ->setSalutation('MR')
            ->setEmailAddress('test@test.com')
            ->setPhoneNumber('00000000000');

        $this->assertEquals('test', $personal->getSurname());
        $this->assertEquals('MR', $personal->getSalutation());
        $this->assertEquals('test@test.com', $personal->getEmailAddress());
        $this->assertEquals('00000000000', $personal->getPhoneNumber());
        $this->assertFalse($personal->isEmpty());
    }

    public function testPersonalComplete()
    {
        $application = self::$application;
        $personal = $application->getCurrentStep();
        $personal->complete();

        $this->assertSame($application->getIncomeStep(), $application->getCurrentStep());
    }

    public function testIncomeFill()
    {
        $application = self::$application;
        $income = $application->getCurrentStep();

        $this->assertTrue($income->isEmpty());
        $this->assertSame($application->getIncomeStep(), $income);

        $income->setNetIncome(5.55)
            ->setFrequency('weekly');

        $this->assertFalse($income->isEmpty());
        $this->assertEquals(5.55, $income->getNetIncome());
        $this->assertEquals('weekly', $income->getFrequency());
    }

    public function testIncomeComplete()
    {
        $application = self::$application;
        $income = $application->getCurrentStep();
        $income->complete();

        $this->assertSame($application->getOutgoingStep(), $application->getCurrentStep());
        $this->assertFalse($application->getPersonalStep()->isEmpty());
    }

    public function testOutgoingFill()
    {
        $application = self::$application;
        $outgoing = $application->getCurrentStep();

        $this->assertTrue($outgoing->isEmpty());
        $this->assertSame($application->getOutgoingStep(), $outgoing);

        $outgoing->setRent(500.99)
            ->setBills(150.00);

        $this->assertFalse($outgoing->isEmpty());
        $this->assertEquals(500.99, $outgoing->getRent());
        $this->assertEquals(150.00, $outgoing->getBills());
    }

    public function testOutgoingComplete()
    {
        $application = self::$application;
        $outgoing = $application->getCurrentStep();
        $outgoing->complete();

        $this->assertSame($application->getConfirmationStep(), $application->getCurrentStep());

        $this->assertFalse($application->getPersonalStep()->isEmpty());
        $this->assertFalse($application->getIncomeStep()->isEmpty());
    }

    public function testConfirmationFill()
    {
        $application = self::$application;
        $confirmation = $application->getCurrentStep();

        $this->assertTrue($confirmation->isEmpty());
        $this->assertSame($application->getConfirmationStep(), $confirmation);

        $confirmation->setSigned(true)
            ->setAcceptedTandCs(true);

        $this->assertFalse($confirmation->isEmpty());
        $this->assertTrue($confirmation->hasSigned());
        $this->assertTrue($confirmation->hasAcceptedTandCs());
    }

    public function testConfirmationComplete()
    {
        $application = self::$application;
        $confirmation = $application->getCurrentStep();
        $confirmation->complete();

        $this->assertSame($application->getCompleteStep(), $application->getCurrentStep());

        $this->assertFalse($application->getPersonalStep()->isEmpty());
        $this->assertFalse($application->getIncomeStep()->isEmpty());
        $this->assertFalse($application->getOutgoingStep()->isEmpty());
    }

    /**
     * @expectedException LogicException
     */
    public function testCompleteComplete()
    {
        $application = self::$application;
        $complete = $application->getCurrentStep();
        $complete->complete();
    }
    
}
