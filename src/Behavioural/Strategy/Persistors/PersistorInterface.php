<?php
namespace Arjf\DesignPatterns\Behavioural\Strategy\Persistors;

interface PersistorInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data);
}