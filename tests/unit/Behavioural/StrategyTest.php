<?php
use Arjf\DesignPatterns\Behavioural\Strategy;
use Arjf\DesignPatterns\Behavioural\Strategy\Persistors;

class StrategyTest extends PHPUnit_Framework_TestCase {
    
    public function getData()
    {
        return array(
            array('id' => 1, 'name' => 'Joe Bloggs', 'dateCreated' => '2016-01-01 12:00:00'),
            array('id' => 2, 'name' => 'Test Tester', 'dateCreated' => '2016-02-01 23:00:00'),
        );
    }
    
    public function testCsvFilePersistor()
    {
        $persistor = new Persistors\CsvFile('php://output', true, 'w');
        $persistor->save($this->getData());
        $this->expectOutputRegex('@^\w+,\w+,\w+@');
        $this->expectOutputRegex('@\"\d{4}\-\d{2}\-\d{2}\s\d{2}\:\d{2}\:\d{2}\"$@');
    }
    
    public function testSessionEmptyNamespacePersistor()
    {
        $persistor = new Persistors\Session();
        $persistor->save($this->getData());
        $this->assertEquals($_SESSION, $this->getData());
    }
    
    public function testSessionSingleNamespacePersistor()
    {
        $persistor = new Persistors\Session(array('test'));
        $persistor->save($this->getData());
        $this->assertEquals($_SESSION['test'], $this->getData());
    }
    
    public function testSessionDoubleNamespacePersistor()
    {
        $persistor = new Persistors\Session(array('test', 'test'));
        $persistor->save($this->getData());
        $this->assertEquals($_SESSION['test']['test'], $this->getData());
    }
    
    public function testCollectionWithMultiplePersistors()
    {
        $persistor = new Persistors\Session(array('test', 'test'));
        $persistor2 = new Persistors\CsvFile('php://output', true, 'w');
        
        $collection = new Strategy\Collection($this->getData(), $persistor);
        $this->assertTrue($collection->save());
        $this->assertEquals($_SESSION['test']['test'], $this->getData());
        
        $collection->setPersistor($persistor2);
        $collection->save();
        $this->expectOutputRegex('@^\w+,\w+,\w+@');
        $this->expectOutputRegex('@\"\d{4}\-\d{2}\-\d{2}\s\d{2}\:\d{2}\:\d{2}\"$@');
    }
    
    /**
     * @expectedException \LogicException
     */
    public function testWithoutPersistor()
    {
        $collection = new Strategy\Collection($this->getData());
        $collection->save();
    }
}
