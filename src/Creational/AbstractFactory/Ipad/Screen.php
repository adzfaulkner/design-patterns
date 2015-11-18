<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Ipad;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Screen implements AbstractFactory\BodyInterface {
    public function getBodyParts() {
        return 'here are the iPad screen parts';
    }
}
