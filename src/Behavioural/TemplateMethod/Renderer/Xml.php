<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class Xml extends AbstractRenderer
{
    /**
     * {@inheritdoc } which is xml
     */
    protected function setContentType()
    {
        $this->setHeader('Content-Type', 'text/xml');
    }
}