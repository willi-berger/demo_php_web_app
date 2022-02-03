<?php
namespace Common\View;

use Common\Application;

abstract class BaseView
{
    /**
     * @var array
     */
    protected $data;
    
    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    
    /**
     * 
     * @param string $uri
     * @return string
     */
    protected function portalUrl($uri) {
        return Application::baseUrl() . '/' . $uri;
    }
    
    /**
     * @param string $view_uri
     * @return string
     */
    protected function viewFileName($view_uri) {
        // TODO resolve doc root hard coded
        return '/var/www/html/' . '/src/view/' . $view_uri . '.php';
    }
    
    /**
     * @return void
     */
    abstract public function view();
}

