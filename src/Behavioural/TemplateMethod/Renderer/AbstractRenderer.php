<?php
namespace Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

abstract class AbstractRenderer
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @param mixed $content
     */
    public function render($content)
    {
        $this->setContentType();
        $this->setHeaders();
        echo $content;
    }

    /**
     * @param string $type
     * @param mixed $value
     * @return $this
     */
    public function setHeader($type, $value)
    {
        $this->headers[$type] = $value;
        return $this;
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return $this;
     */
    protected function setHeaders()
    {
        foreach($this->getHeaders() as $type => $value) {
            header($type . ': ' . $value);
        }
    }

    /**
     * sets the header content type for the class
     */
    abstract protected function setContentType();
}