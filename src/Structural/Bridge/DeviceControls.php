<?php
namespace Arjf\DesignPatterns\Structural\Bridge;

class DeviceControls
{
    /**
     *
     * @var \Arjf\DesignPatterns\Structural\Bridge\ScreenInterface
     */
    protected $screen;
    
    /**
     * @param \Arjf\DesignPatterns\Structural\Bridge\ScreenInterface $screen
     */
    public function __construct(ScreenInterface $screen)
    {
        $this->screen = $screen;
    }
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\DeviceControls
     */
    public function homeButtonPressed()
    {
        if ($this->screen->isIlluminated() === true) {
            $this->screen->darken();
        } else {
            $this->screen->illuminate();
        }
        
        return $this;
    }
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\DeviceControls
     */
    public function accessbilityContrastSlideLeft()
    {
        $this->screen->decreaseContrast();
        return $this;
    }
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\DeviceControls
     */
    public function accessbilityContrastSlideRight()
    {
        $this->screen->increaseContrast();
        return $this;
    }
}
