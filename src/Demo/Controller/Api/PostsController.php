<?php
namespace Demo\Controller\Api;

use Common\ProcessRequestApiResult;
use Demo\Model\Posts;
use Common\Controller\AbstractController;

/**
 * Class PostsController
 * @author willie
 *
 */
class PostsController extends AbstractController
{
    /**
     * 
     * @param mixed $param
     * @return \Common\ProcessRequestResult
     */
    function indexAction($param) {
        
        $this->getLogger()->debug('index action');
        
        $model = new Posts();
        $posts = $model->getPosts(null);
        
        $result = new ProcessRequestApiResult();
        $result->setData($posts);
        
        return $result;
    }
}

