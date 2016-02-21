<?php
namespace Arjf\DesignPatterns\Behavioural\Observer\Observers;

trait UpdatedTrait {
    
    /**
     *
     * @var bool
     */
    public $updated = false;
    
    /**
     * @param bool $updated
     */
    private function setUpdated($updated)
    {
        $this->updated = $updated;
    }
    
    /**
     * 
     * @return bool
     */
    public function isUpdated()
    {
        return $this->updated;
    }
}