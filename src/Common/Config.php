<?php
namespace Common;

use Common\Traits\Logger;

class Config
{
    use Logger;
    
    const INI_FILE = "app.ini";
    

    /**
     * @var string
     */
    protected $dbHost;

    /**
     * @var string
     */
    protected $dbName;
    
    
    /**
     * @var string
     */
    protected $dbUserName;
    
    /**
     * @var string
     */
    protected $dbPassword;
    
 
    /**
     * @return string
     */
    public function getDbHost()
    {
        return $this->dbHost;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @param string $dbHost
     */
    public function setDbHost($dbHost)
    {
        $this->dbHost = $dbHost;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }

    /**
     * @return string
     */
    public function getDbUserName()
    {
        return $this->dbUserName;
    }

    /**
     * @return string
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }


    /**
     * @param string $dbUserName
     */
    public function setDbUserName($dbUserName)
    {
        $this->dbUserName = $dbUserName;
    }

    /**
     * @param string $dbPassword
     */
    public function setDbPassword($dbPassword)
    {
        $this->dbPassword = $dbPassword;
    }

    
    
    public function init() {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . self::INI_FILE, true);
        $this->getLogger()->info(sprintf('initilize config from: %s', json_encode($config)));
        $this->setDbHost($config['DB']['dbhost']);
        $this->setDbName($config['DB']['dbname']);
        $this->setDbUserName($config['DB']['user']);
        $this->setDbPassword($config['DB']['password']);
    }
    
    
}

