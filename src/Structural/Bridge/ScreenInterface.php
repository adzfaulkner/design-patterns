<?php
namespace Arjf\DesignPatterns\Structural\Bridge;

interface ScreenInterface
{
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function illuminate();
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function darken();
    
    /**
     * @return bool
     */
    public function isIlluminated();
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function increaseContrast();
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function decreaseContrast();
    
    /**
     * @return int
     */
    public function getContrast();
}
