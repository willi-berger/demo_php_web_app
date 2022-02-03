<?php
namespace Common;

class ProcessRequestApiResult extends ProcessRequestResult
{
    public function __construct() {
        parent::__construct();
        $this->setIsApiResult(true);
    }
}

