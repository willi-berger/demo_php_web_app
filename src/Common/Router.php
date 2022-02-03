<?php
namespace Common;

use Common\Controller\AbstractController;

/**
 * Class Router
 * @author willie
 *
 */
class Router
{
    use Traits\Logger;
    
    /**
     * 
     * @return ProcessRequestResult
     */
    function processRequest() {
        
        // http://localhost/portal/posts
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];
        $this->getLogger()->debug(sprintf('uri %s, method %s', $request_uri, $request_method));
        list(, $prefix, $domain, $method, $param_1, $param_2) = explode('/', $request_uri);
        if (empty($method)) {
            $method = 'index';
        }
        
        // controller class name
        $controller_class_name = $this->appName() 
            . '\\Controller\\' . ucfirst($prefix) . '\\' . ucfirst($domain) . 'Controller';

        // instantiate controller
        /** @var AbstractController $controller */
        $controller = new $controller_class_name;
        $controller->setLogger($this->getLogger());
        $method_name = $method . 'Action';
        
        // involke action
        $process_req_result = $controller->$method_name($param_1);
        
        return $process_req_result;
    }
    
    /** 
     * @return string
     */
    function appName() {
        // TODO make app name "Demo" configurable
        return 'Demo';
    }
}

