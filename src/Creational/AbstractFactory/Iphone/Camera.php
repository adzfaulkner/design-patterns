<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Iphone;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Camera implements AbstractFactory\CameraInterface {
    public function getCameraParts() {
        return 'here are the iPhone camera parts';
    }
}
