<?php
namespace Demo\View\Posts;

use Common\View\BaseView;

class PostsDetailView extends BaseView
{
    public function view()
    {
        require $this->viewFileName('posts/detail');
    }

}

