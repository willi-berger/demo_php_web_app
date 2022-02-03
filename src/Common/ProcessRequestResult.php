<?php
namespace Common;

use Common\View\BaseView;

/**
 * Class ProcessRequestResult
 *
 */
abstract class ProcessRequestResult
{
    /**
     * @var boolean
     */
    protected $isApiResult;
    
    /**
     * @var array
     */
    protected $data;
    
    /**
     * @var BaseView
     */
    protected $view;
    
    /**
     * constructor
     */
    public function __construct() {
    }
    
    /**
     * @return boolean
     */
    public function isIsApiResult()
    {
        return $this->isApiResult;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param boolean $isApiResult
     * @return static
     */
    public function setIsApiResult($isApiResult)
    {
        $this->isApiResult = $isApiResult;
        
        return $this;
    }

    /**
     * @param array $model
     * @return static
     */
    public function setData($model)
    {
        $this->data = $model;
        
        return $this;
    }

    /**
     * @return BaseView
     */
    public function getView()
    {
        return $this->view;
    }
    
    /**
     * @param BaseView $view
     * @return static
     */
    public function setView($view)
    {
        $this->view = $view;
        
        return $this;
    }
    
}

