<?php
namespace Arjf\DesignPatterns\Structural\Adapter\Iphone\Screen;
use Arjf\Devices\Handheld\Apple\Screen as AppleScreen;

class Adapter extends AppleScreen {    
    /**
     * 
     * @param \Arjf\DesignPatterns\Structural\Adapter\Iphone3Screen $screen
     */
    public function __construct(Screen $screen) {
        parent::__construct(
            $screen->getWidth(), 
            $screen->getHeight(), 
            false
        );
    }
}