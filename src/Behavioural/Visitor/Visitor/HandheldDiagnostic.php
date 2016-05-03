<?php
namespace Arjf\DesignPatterns\Behavioural\Visitor\Visitor;

use Arjf\Devices\Handheld\AbstractAppleHandheld;

class HandheldDiagnostic implements VisitorInterface
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
     */
    public function diagnose()
    {
        $this->diagnoseScreen()
            ->diagnoseHardDrive();
    }

    /**
     * Diagnose the screen
     *
     * @return $this
     */
    protected function diagnoseScreen()
    {
        $screen = $this->handheld->getScreen();

        echo 'Running diagnostic on screen' . PHP_EOL;
        echo 'Screen width: ' . $screen->getWidth() . PHP_EOL;
        echo 'Screen height: ' . $screen->getHeight() . PHP_EOL;
        return $this;
    }

    /**
     * Diagnose the internal storage
     *
     * @return $this
     */
    protected function diagnoseHardDrive()
    {
        $handheld = $this->handheld;

        echo 'Running diagnostic on storage' . PHP_EOL;
        echo 'Capacity: ' . $handheld->getCapacity() . 'gb' . PHP_EOL;
    }
}
