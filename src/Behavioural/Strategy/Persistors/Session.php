<?php
namespace Arjf\DesignPatterns\Behavioural\Strategy\Persistors;

class Session implements PersistorInterface
{    
    /**
          * @var array
     */
    protected $namespaces = array();
    
    /**
     * @param array $namespaces
     */
    public function __construct(array $namespaces = array()) {
        $this->namespaces = $namespaces;
    }
    
    /**
     * @param array $data
     * @return true
     */
    public function save(array $data)
    {
        $subject =& $_SESSION;
        
        foreach ($this->namespaces as $namespace) {
            $subject[$namespace] = array();
            $subject =& $subject[$namespace];
        }
        
        $subject = $data;
        return true;
    }
}
