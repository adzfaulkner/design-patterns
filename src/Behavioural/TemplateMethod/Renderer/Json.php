<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class Json extends AbstractRenderer
{
    protected function setContentType()
    {
        $this->setHeader('Content-Type', 'application/json');
    }
}