<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory\Ipad;
use Arjf\DesignPatterns\Creational\AbstractFactory;

class Camera implements AbstractFactory\CameraInterface {
    public function getCameraParts() {
        return 'here are the iPad camera parts';
    }
}
