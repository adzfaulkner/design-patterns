<?php
namespace Arjf\DesignPatterns\Behavioural\Visitor\Visitor;

use Arjf\Devices\Handheld\AbstractAppleHandheld;

class HandheldSpecification implements VisitorInterface
{
    /**
     * @var AbstractAppleHandheld
     */
    protected $handheld;

    /**
     * Produces a specification
     *
     * @param AbstractAppleHandheld $handheld
     */
    public function visit(AbstractAppleHandheld $handheld)
    {
        $this->handheld = $handheld;
    }

    /**
     * Generates a device spefication and returns it in string format
     *
     * @return string
     */
    public function getSpecification()
    {
        $handheld = $this->handheld;
        $screen = $handheld->getScreen();

        return implode(PHP_EOL, [
            'Colour is: ' . $handheld->getColour(),
            'Price is: ' . $handheld->getPrice(),
            'Screen dimensions: ' . $screen->getHeight() . 'x' . $screen->getWidth(),
            'Device Capacity: ' . $handheld->getCapacity(),
        ]);
    }
}
