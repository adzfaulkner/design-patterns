<?php
namespace Arjf\DesignPatterns\Structural\Flyweight;
use \ArrayObject;
use Arjf\Devices\Handheld\Apple\Screen;

class ScreenFlyweightFactory {
    
    /**
     * @var array
     */
    protected $screensRetina;
    
    /**
     * @var array
     */
    protected $screensNonRetina;
    
    /**
     * 
     */
    public function __construct() {
        $this->screensRetina = new ArrayObject();
        $this->screensNonRetina = new ArrayObject();
    }
    
    /**
     * 
     * @param type $width
     * @param type $height
     * @param type $store
     * @return Screen
     */
    protected function getInstance($width, $height, $store)
    {
        $key = $width . 'x' . $height;
        
        if ($store->offsetExists($key) === false) {
            $store[$key] = new Screen($width, $height);
        }
        
        return $store[$key];
    }
    
    /**
     * 
     * @param type $width
     * @param type $height
     * @return Screen
     */
    public function getRetinaScreen($width, $height)
    {
        return $this->getInstance($width, $height, $this->screensRetina);
    }
    
    /**
     * 
     * @param int $width
     * @param int $height
     */
    public function getNonRetinaScreen($width, $height)
    {
        $screen = $this->getInstance($width, $height, $this->screensNonRetina);
        $screen->setRetina(false);
        return $screen;
    }
    
}
