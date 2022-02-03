<?php
namespace Common;


use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Application
{
    /**
     * 
     * @var string
     */
    const LOG_FILE_NAME = 'app.log';
    
    /**
     * 
     * @var Router
     */
    protected $router;
    
    /**
     * 
     * @var LoggerInterface
     */
    static $logger;
    
    /**
     * 
     * @var Config
     */
    static $config;
    
    /**
     * 
     * @var string
     */
    protected $documentRoot;
    
    /**
     * @return \Psr\Log\LoggerInterface
     */
    public static function logger()
    {
        return static::$logger;
    }

 
    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param Router $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
    }

    /**
     * @return string
     */
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }

    /**
     * @param string $documentRoot
     */
    public function setDocumentRoot($documentRoot)
    {
        $this->documentRoot = $documentRoot;
    }

    /**
     * initialize application
     */
    public function initialize() {        
        
        // init logger:
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(self::LOG_FILE_NAME, Logger::DEBUG));
        static::$logger = $log;
        
        static::logger()->info('initialized logger ');
        static::logger()->debug(__DIR__);
        static::logger()->debug(__FILE__);
        static::logger()->debug(sprintf('home : %s', getenv('HOME')));
        
        // configuration
        $config = new Config();
        $config->setLogger($log);
        $config->init();
        static::$config = $config;
        
        
        // init router
        $router = new Router();
        $router->setLogger($log);
        $this->setRouter($router);
    }
    
    /**
     * @return Config
     */
    public static function config() {
        
        return static::$config;
    }
    
    /**
     * 
     * @return string
     */
    public static function baseUrl() {
        // TODO resolve hard coded
        return 'http://localhost';
    }
}

