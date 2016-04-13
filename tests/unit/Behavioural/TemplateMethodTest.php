<?php
use Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer;

class TemplateMethodTest extends PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testHtmlRendererContentType()
    {
        $content = '<html><body>Hello</body></html>';
        $renderer = $this->getRendererMock('Html');
        $renderer->render($content);
        $this->expectOutputString($content);
        $this->assertArrayHasKey('Content-Type', Phake::makeVisible($renderer)->getHeaders());
        $this->assertEquals(Phake::makeVisible($renderer)->getHeaders()['Content-Type'], 'text/html');
    }

    /**
     * @runInSeparateProcess
     */
    public function testHtmlRendererContentTypeOveride()
    {
        $content = '<html><body>Hello</body></html>';
        $renderer = $this->getRendererMock('Html');
        $renderer->setHeader('Content-Type', 'test');
        $renderer->render($content);
        $this->expectOutputString($content);
        $this->assertArrayHasKey('Content-Type', Phake::makeVisible($renderer)->getHeaders());
        $this->assertEquals(Phake::makeVisible($renderer)->getHeaders()['Content-Type'], 'text/html');
    }

    /**
     * @runInSeparateProcess
     */
    public function testJsonRendererContentType()
    {
        $content = '[1,2,3,4]';
        $renderer = $this->getRendererMock('Json');
        $renderer->render($content);
        $this->expectOutputString($content);
        $this->assertArrayHasKey('Content-Type', Phake::makeVisible($renderer)->getHeaders());
        $this->assertEquals(Phake::makeVisible($renderer)->getHeaders()['Content-Type'], 'application/json');
    }

    /**
     * @runInSeparateProcess
     */
    public function testJsonRendererContentTypeOveride()
    {
        $content = '[1,2,3,4]';
        $renderer = $this->getRendererMock('Json');
        $renderer->setHeader('Content-Type', 'test');
        $renderer->render($content);
        $this->expectOutputString($content);
        $this->assertArrayHasKey('Content-Type', Phake::makeVisible($renderer)->getHeaders());
        $this->assertEquals(Phake::makeVisible($renderer)->getHeaders()['Content-Type'], 'application/json');
    }

    /**
     * @runInSeparateProcess
     */
    public function testXmlRendererContentType()
    {
        $content = '<xml><a>1</a><b>2</b>';
        $renderer = $this->getRendererMock('Xml');
        $renderer->render($content);
        $this->expectOutputString($content);
        $this->assertArrayHasKey('Content-Type', Phake::makeVisible($renderer)->getHeaders());
        $this->assertEquals(Phake::makeVisible($renderer)->getHeaders()['Content-Type'], 'text/xml');
    }

    /**
     * @runInSeparateProcess
     */
    public function testXmlRendererContentTypeOveride()
    {
        $content = '<xml><a>1</a><b>2</b>';
        $renderer = $this->getRendererMock('Xml');
        $renderer->setHeader('Content-Type', 'test');
        $renderer->render($content);
        $this->expectOutputString($content);
        $this->assertArrayHasKey('Content-Type', Phake::makeVisible($renderer)->getHeaders());
        $this->assertEquals(Phake::makeVisible($renderer)->getHeaders()['Content-Type'], 'text/xml');
    }

    /**
     * @param string $type
     * @return Renderer\AbstractRenderer
     */
    private function getRendererMock($type)
    {
        $renderer = Phake::partialMock('\Arjf\DesignPatterns\Behavioural\TemplateMethod\Renderer\\' . $type);
        return $renderer;
    }

}
