<?php

namespace Demo\Hello;

/**
 * @author willie
 *
 */
class Hello
{
    /**
     * @param string $name
     */
    function __construct($name = 'Hello')
    {
        $this->name = $name;
        
    }
    
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $name2;
    
    /**
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @param string $name2
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;
    }

    public function sayHello() 
    {
        return "Hello {$this->getName()}, I am class 'Hello'! it is " . date('Y-m-d h:m:s');
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = name;
    }

}