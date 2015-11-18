<?php
namespace Arjf\DesignPatterns\Creational\AbstractFactory;

abstract class AbstractDeviceFactory {
    abstract public function createBody();
    abstract public function createCamera();
    abstract public function createScreen();
}
