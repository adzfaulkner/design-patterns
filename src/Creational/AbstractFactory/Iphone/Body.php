<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Iphone;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Body implements AbstractFactory\BodyInterface {
    public function getBodyParts() {
        return 'here are the iPhone body parts';
    }
}
