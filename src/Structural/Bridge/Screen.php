<?php
namespace Arjf\DesignPatterns\Structural\Bridge;
use Arjf\Devices\Handheld\Apple\Screen as AppleScreen;

class Screen extends AppleScreen implements ScreenInterface
{
    const CONTRAST_FLOOR = 1;
    const CONTRAST_CEIL = 10;
    
    /**
     * @var int
     */
    protected $contrast;
    
    /**
     * @var bool 
     */
    protected $illuminated;
    
    /**
     * @param int $width
     * @param int $height
     * @param bool $retina
     */
    public function __construct($width, $height, $retina = true) {
        parent::__construct($width, $height, $retina);
        $this->contrast = self::CONTRAST_FLOOR;
        $this->illuminate();
    }

    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function illuminate()
    {
        $this->illuminated = true;
        return $this;
    }
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function darken()
    {
        $this->illuminated = false;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isIlluminated()
    {
        return $this->illuminated;
    }
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function increaseContrast()
    {
        if ($this->isIlluminated() && $this->contrast < self::CONTRAST_CEIL) {
            $this->contrast++;
        }
        
        return $this;
    }
    
    /**
     * @return \Arjf\DesignPatterns\Structural\Bridge\Screen
     */
    public function decreaseContrast()
    {
        if ($this->isIlluminated() && $this->contrast > self::CONTRAST_FLOOR) {
            $this->contrast--;
        }
        
        return $this;
    } 
    
    /**
     * @return int
     */
    public function getContrast()
    {
        return $this->contrast;
    }
}

