<?php
namespace Arjf\DesignPatterns\Creational\Builder\Ipad;
use Arjf\DesignPatterns\Creational\Builder\AbstractDirector;
use Arjf\DesignPatterns\Creational\Builder\AbstractBuilder;
use Arjf\Devices\Handheld\AbstractAppleHandheld;

class Director extends AbstractDirector {
    /**
     * 
     * @param AbstractBuilder $builder
     * @return AbstractAppleHandheld
     */
    public function build(AbstractBuilder $builder) {
        $builder->buildScreen();
        $builder->buildAuxOut();
        $builder->buildCamera();
        $builder->buildShell();
        return $builder->getDevice();
    }
}