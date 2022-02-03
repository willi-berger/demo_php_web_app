<?php
namespace Demo\Controller\Portal;

use Common\ProcessRequestPortalResult;
use Common\Controller\AbstractController;
use Demo\Model\Posts;
use Demo\View\Posts\ListView;
use Demo\View\Posts\PostsDetailView;

/**
 * Class PostsController
 *
 */
class PostsController extends AbstractController
{
    /**
     * 
     * @param mixed $param
     * @return \Common\ProcessRequestPortalResult
     */
    function indexAction($param) {
        
        $this->getLogger()->debug(get_class($this) . ' index action');
        
        $model = new Posts();
        $posts = $model->getPosts(null);
        $data = array(
            'posts' => $posts,
        );
        $view = new ListView();
        $view->setData($data);
        
        $result = new ProcessRequestPortalResult();
        $result
        ->setView($view)
        ->setData($data);
        
        return $result;
    }
    
    /**
     * 
     * @param mixed $param
     */
    function addAction($param) {
        $this->getLogger()->debug(get_class($this) . ' add action');
        
        $data = array(
        );
        $view = new PostsDetailView();
        $view->setData($data);
        
        $result = new ProcessRequestPortalResult();
        $result
        ->setView($view)
        ->setData($data);
        
        return $result;
    }
}

