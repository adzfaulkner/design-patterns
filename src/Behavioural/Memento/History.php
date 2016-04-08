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
     */
    public function restoreLast()
    {
        return $this->restore($this->getLastIndex());
    }

    /**
     * @param int $index
     * @return Application
     * @thows \OutOfBoundsException
     */
    public function restore($index)
    {
        if (empty($this->history[$index])) {
            throw new \OutOfBoundsException('State does not exist');
        }

        return unserialize($this->history[$index]);
    }

    /**
     * @return int
     */
    protected function getLastIndex()
    {
        return count($this->history) - 1;
    }
}
