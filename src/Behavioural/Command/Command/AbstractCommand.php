<?php
namespace Arjf\DesignPatterns\Behavioural\Command\Command;

use Arjf\DesignPatterns\Behavioural\Command\Warehouse;

abstract class AbstractCommand implements CommandInterface
{
    /**
     * @var Warehouse
     */
    protected $warehouse;

    /**
     * @param Warehouse $warehouse
     */
    public function __construct(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
    }
}
