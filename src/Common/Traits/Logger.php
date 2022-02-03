<?php
namespace Common\Traits;

use Psr\Log\LoggerInterface;

trait Logger
{
    /**
     * 
     * @var LoggerInterface
     */
    protected $logger;
    
    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    
    
}

