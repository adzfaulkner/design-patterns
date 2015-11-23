<?php
namespace Arjf\DesignPatterns\Creational\Singleton;

class Instance {
    
    static private $instance;
    
    private function __construct() {}
    
    static public function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
}
