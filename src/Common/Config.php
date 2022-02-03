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
    protected $dataSourceName;
    
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
    public function getDataSourceName()
    {
        return $this->dataSourceName;
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
     * @param string $dataSourceName
     */
    public function setDataSourceName($dataSourceName)
    {
        $this->dataSourceName = $dataSourceName;
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
        $this->setDataSourceName($config['DB']['dsn']);
        $this->setDbUserName($config['DB']['user']);
        $this->setDbPassword($config['DB']['password']);
    }
    
    
}

