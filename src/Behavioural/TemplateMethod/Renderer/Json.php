<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class Json extends AbstractRenderer
{
    /**
     * {@inheritdoc } which is json
     */
    protected function setContentType()
    {
        $this->setHeader('Content-Type', 'application/json');
    }
}