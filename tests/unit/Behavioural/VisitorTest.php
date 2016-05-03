<?php
use Arjf\DesignPatterns\Behavioural\Visitor\Handheld;
use Arjf\DesignPatterns\Behavioural\Visitor\Visitor;
use Arjf\Devices\Handheld\AbstractAppleHandheld;
use Arjf\Devices\Handheld\Apple\Screen;

class VisitorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Screen
     */
    protected $screen;

    public function setUp()
    {
        $this->screen = Phake::partialMock(
            'Arjf\Devices\Handheld\Apple\Screen',
            320,
            480
        );
    }

    /**
     * @dataProvider initHandholdSpecifcation
     */
    public function testHandheldSpecification(AbstractAppleHandheld $device, Visitor\HandheldSpecification $visitor)
    {
        $screen = $device->getScreen();
        $device->accept($visitor);

        $this->assertEquals('Colour is: ' . $device->getColour() . PHP_EOL .
'Price is: ' . $device->getPrice()  . PHP_EOL .
'Screen dimensions: ' . $screen->getHeight() . 'x' . $screen->getWidth() . PHP_EOL .
'Device Capacity: ' . $device->getCapacity(), $visitor->getSpecification());
    }

    /**
     * @dataProvider initHandholdDiagnostic
     */
    public function testHandheldDiagnose(AbstractAppleHandheld $device, Visitor\HandheldDiagnostic $visitor)
    {
        $screen = $device->getScreen();
        $device->accept($visitor);

        $visitor->diagnose();

        $this->expectOutputRegex('@Screen width: ' . $screen->getWidth() . '@');
        $this->expectOutputRegex('@Screen height: ' . $screen->getHeight() . '@');
        $this->expectOutputRegex('@Capacity: ' . $device->getCapacity() . 'gb@');
    }

    /**
     * Creates the necessary test subjects for the specification
     *
     * @return array
     */
    public function initHandholdSpecifcation()
    {
        $screen = $this->getScreen();

        return [
            [new Handheld\Six($screen), new Visitor\HandheldSpecification()],
            [new Handheld\SixPlus($screen), new Visitor\HandheldSpecification()],
        ];
    }

    /**
     * Creates the necessary test subjects for the diagnostic
     *
     * @return array
     */
    public function initHandholdDiagnostic()
    {
        $screen = $this->getScreen();

        return [
            [new Handheld\Six($screen), new Visitor\HandheldDiagnostic()],
            [new Handheld\SixPlus($screen), new Visitor\HandheldDiagnostic()],
        ];
    }

    /**
     * For some reason setUp nor setUpBeforeClass would create the requested object
     *
     * @return Screen
     */
    protected function getScreen()
    {
        if (empty($this->screen) === true) {
            $this->screen = Phake::partialMock(
                'Arjf\Devices\Handheld\Apple\Screen',
                320,
                480
            );
        }

        return $this->screen;
    }

}
