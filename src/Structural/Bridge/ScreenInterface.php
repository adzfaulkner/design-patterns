<?php
namespace Arjf\DesignPatterns\Structural\Adapter\Iphone\Screen;

class Screen {
    /**
     *
     * @var int
     */
    protected $width;
    
    /**
     *
     * @var int 
     */
    protected $height;
    
    /**
     * 
     * @param int $width
     * @param int $height
     */
    public function __construct($width, $height) {
        $this->setWidth($width);
        $this->setHeight($height);
    }
    
    /**
     * 
     * @return int
     */
    public function getWidth()
    {
        return (int)$this->width;
    }
    
    /**
     * 
     * @param int $width
     */
    public function setWidth($width) 
    {
        $this->width = (int)$width;
    }
    
    /**
     * 
     * @return int
     */
    public function getHeight()
    {
        return (int)$this->height;
    }
    
    /**
     * 
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = (int)$height;
    }
}