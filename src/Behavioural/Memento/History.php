<?php
namespace Arjf\DesignPatterns\Behavioural\Memento;
use Arjf\DesignPatterns\Behavioural\State\Application;

class History
{
    /**
     *
     * @var type
     */
    protected $history = array();

    /**
     * @param Application $application
     */
    public function saveState(Application $application)
    {
        $this->history[] = serialize($application);
    }

    /**
     * @return Application
     * @thows \LogicException
     */
    public function restoreLast()
    {
        if (empty(count($this->history))) {
            throw new \LogicException('No states have been saved');
        }

        return $this->restore(count($this->history)-1);
    }

    /**
     * @param int $index
     * @return Application
     */
    public function restore($index)
    {
        return unserialize($this->history[$index]);
    }
}
