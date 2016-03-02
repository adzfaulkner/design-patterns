<?php
namespace Arjf\DesignPatterns\Behavioural\Strategy\Persistors;

class CsvFile implements PersistorInterface
{
    const DEFAULT_MODE = 'w+';
    
    /**
     * @var string
     */
    protected $fileLoc;
    
    /**
     * @var string
     */
    protected $fileMode;
    
    /**
     * @var bool
     */
    protected $generateHeader;
    
    /**
     * 
     * @param string $fileLoc
     * @param string $generateHeader
     * @param bool $fileMode
     */
    public function __construct($fileLoc, $generateHeader = true, $fileMode = self::DEFAULT_MODE) 
    {
        $this->fileLoc = $fileLoc;
        $this->fileMode = $fileMode;
        $this->generateHeader = $generateHeader;
    }
    
    /**
     * @param array $data
     * @return true
     */
    public function save(array $data)
    {
        $fp = fopen($this->fileLoc, $this->fileMode);
        
        if ($this->generateHeader === true) {
            fputcsv($fp, array_keys($data[key($data)]));
        }

        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        return true;
    }
}
