<?php
namespace Demo\View\Posts;

use Common\View\BaseView;

class ListView extends BaseView
{
    public function view() {
        require $this->viewFileName('posts/list');
    }
        
}

