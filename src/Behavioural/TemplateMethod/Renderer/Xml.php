<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class Xml extends AbstractRenderer
{
    protected function setContentType()
    {
        $this->setHeader('Content-Type', 'text/xml');
    }
}