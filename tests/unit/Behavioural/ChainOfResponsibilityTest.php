<?php
use Arjf\DesignPatterns\Behavioural\ChainOfResponsibility;
use Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Validator;
use Arjf\DesignPatterns\Behavioural\ChainOfResponsibility\Handler;

class ChainOfResponsibiltyTest extends PHPUnit_Framework_TestCase
{
    
    public function testIsAlphanumericValidator()
    {
        $validator = new Validator\IsAlphanumeric();
        $this->assertFalse($validator->isValid(123));
        $this->assertFalse($validator->isValid(12.3));
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid('000-1111'));
        $this->assertTrue($validator->isValid('aaa111'));
        $this->assertFalse($validator->isValid(null));
        $this->assertFalse($validator->isValid(array()));
    }

    public function testIsFloat()
    {
        $validator = new Validator\IsFloat();
        $this->assertFalse($validator->isValid(123));
        $this->assertTrue($validator->isValid(12.3));
        $this->assertTrue($validator->isValid('1223.56'));
        $this->assertFalse($validator->isValid('000-1111'));
        $this->assertFalse($validator->isValid('aaa111'));
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(null));
        $this->assertFalse($validator->isValid(array()));
    }

    public function testIsInt()
    {
        $validator = new Validator\IsInt();
        $this->assertFalse($validator->isValid('000-1111'));
        $this->assertFalse($validator->isValid('aaa111'));
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid('aass112342'));
        $this->assertTrue($validator->isValid(123));
        $this->assertTrue($validator->isValid(1200));
        $this->assertTrue($validator->isValid('1223'));
        $this->assertFalse($validator->isValid(null));
        $this->assertFalse($validator->isValid(array()));
    }

    public function testIsNotEmpty()
    {
        $validator = new Validator\IsNotEmpty();
        $this->assertTrue($validator->isValid('000-1111'));
        $this->assertTrue($validator->isValid('aaa111'));
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(null));
        $this->assertFalse($validator->isValid(array()));
        $this->assertTrue($validator->isValid(123));
        $this->assertTrue($validator->isValid(1200));
        $this->assertTrue($validator->isValid('1223'));
    }

    public function testIsNumeric()
    {
        $validator = new Validator\IsNumeric();
        $this->assertFalse($validator->isValid('000-1111'));
        $this->assertFalse($validator->isValid('aaa111'));
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(null));
        $this->assertFalse($validator->isValid(array()));
        $this->assertTrue($validator->isValid(123));
        $this->assertTrue($validator->isValid('1223'));
        $this->assertTrue($validator->isValid(1200));
        $this->assertTrue($validator->isValid('99.88'));
        $this->assertTrue($validator->isValid(1.99));
    }

    public function testIsString()
    {
        $validator = new Validator\IsString();
        $this->assertTrue($validator->isValid('000-1111'));
        $this->assertTrue($validator->isValid('aaa111'));
        $this->assertTrue($validator->isValid(''));
        $this->assertFalse($validator->isValid(null));
        $this->assertFalse($validator->isValid(array()));
        $this->assertFalse($validator->isValid(123));
        $this->assertTrue($validator->isValid('1223'));
        $this->assertFalse($validator->isValid(1200));
        $this->assertTrue($validator->isValid('99.88'));
        $this->assertFalse($validator->isValid(1.99));
    }

    public function testHandlerString()
    {
        $handler1 = new Handler\NotEmpty(new Validator\IsNotEmpty());
        $handler2 = new Handler\String(new Validator\IsString());
        $handler3 = new Handler\Alphanumeric(new Validator\IsAlphanumeric());

        $handler1->setNextHandler($handler2);
        $handler2->setNextHandler($handler3);

        $this->assertEquals(Handler\NotEmpty::MESSAGE, $handler1->process(null));
        $this->assertEquals(Handler\String::MESSAGE, $handler1->process(1.22));
        $this->assertEquals(Handler\Alphanumeric::MESSAGE, $handler1->process('00-11'));
        $this->assertNull($handler1->process('00aa'));
    }

    public function testHandlerFloat()
    {
        $handler1 = new Handler\NotEmpty(new Validator\IsNotEmpty());
        $handler2 = new Handler\Numeric(new Validator\IsNumeric());
        $handler3 = new Handler\Float(new Validator\IsFloat());

        $handler1->setNextHandler($handler2);
        $handler2->setNextHandler($handler3);

        $this->assertEquals(Handler\NotEmpty::MESSAGE, $handler1->process(''));
        $this->assertEquals(Handler\Numeric::MESSAGE, $handler1->process('1aa'));
        $this->assertEquals(Handler\Float::MESSAGE, $handler1->process(1));
        $this->assertNull($handler1->process('1.22'));
    }

    public function testHandlerInt()
    {
        $handler1 = new Handler\NotEmpty(new Validator\IsNotEmpty());
        $handler2 = new Handler\Numeric(new Validator\IsNumeric());
        $handler3 = new Handler\Int(new Validator\IsInt());

        $handler1->setNextHandler($handler2);
        $handler2->setNextHandler($handler3);

        $this->assertEquals(Handler\NotEmpty::MESSAGE, $handler1->process(''));
        $this->assertEquals(Handler\Numeric::MESSAGE, $handler1->process('1.z'));
        $this->assertEquals(Handler\Int::MESSAGE, $handler1->process(1.1));
        $this->assertNull($handler1->process(5));
    }
}
