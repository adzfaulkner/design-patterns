<?php
namespace Arjf\DesignPatterns\Behavioural\Strategy;
use Arjf\DesignPatterns\Behavioural\Strategy\Persistors\PersistorInterface;

class Collection
{

    /**
     *
     * @var array
     */
    protected $data;
    
    /**
     *
     * @var null|PersistorInterface
     */
    protected $persistor;
    
    /**
     * 
     * @param array $data
     */
    public function __construct(array $data, PersistorInterface $persistor = null) 
    {
        $this->data = $data;
        $this->setPersistor($persistor);
    }
    
    /**
     * @return bool
     * @thows \LogicException
     */
    public function save()
    {
        if (empty($this->persistor) === true) {
            throw new \LogicException('Unable to save without an assigned persistor');
        }
        
        return $this->persistor->save($this->data);
    }
    
    /**
     * @param PersistorInterface $persistor
     */
    public function setPersistor(PersistorInterface $persistor = null)
    {
        $this->persistor = $persistor;
    }

}