<?php
namespace Common\Model;

use \PDO;
use Common\Application;

class BaseModel
{
    /**
     * 
     * @var PDO
     */
    protected $pdo;
    
    protected function new_pdo() 
    {
        $config = Application::config();
        $data_source = sprintf('mysql:host=%s;dbname=%s', $config->getDbHost(), $config->getDbName());
        
        $dbh = new PDO(
            $data_source, 
            $config->getDbUserName(),
            $config->getDbPassword()
        );
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $this->setPdo($dbh);
    }
    
    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    
}

