<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class Html extends AbstractRenderer
{
    protected function setContentType()
    {
        $this->setHeader('Content-Type', 'text/html');
    }
}