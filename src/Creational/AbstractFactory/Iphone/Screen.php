<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Iphone;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Screen implements AbstractFactory\ScreenInterface {
    public function getScreenParts() {
        return 'here are the iPhone screen parts';
    }
}
