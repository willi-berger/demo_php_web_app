<?php
namespace Common;

/**
 * 
 * @author willie
 *
 */
class ProcessRequestPortalResult extends ProcessRequestResult
{

    public function __construct() {
        parent::__construct();
        $this->setIsApiResult(false);
    }
    
}

