<?php
namespace Arjf\DesignPatterns\Creational\Builder;

abstract class AbstractDirector {
    abstract public function build(AbstractBuilder $builder);
}