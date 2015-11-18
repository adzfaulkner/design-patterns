<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Ipad;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Body implements AbstractFactory\BodyInterface {
    public function getBodyParts() {
        return 'here are the iPad body parts';
    }
}
