<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class Html extends AbstractRenderer
{
    /**
     * {@inheritdoc } which is html
     */
    protected function setContentType()
    {
        $this->setHeader('Content-Type', 'text/html');
    }
}