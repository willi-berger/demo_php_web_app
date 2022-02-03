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
    
    protected function new_pdo() {
        $dbh = new PDO(
            'mysql:host=db', // Application::config()->getDataSourceName(), //'sqlite:mydb.sq3'
            Application::config()->getDbUserName(),
            Application::config()->getDbPassword()
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

