<?php
namespace Demo\Model;

use Common\Model\BaseModel;
use Demo\Model\DataObject\Post;
use \PDO;

class Posts extends BaseModel
{
    /**
     * 
     * @param mixed $param
     * @throws \RuntimeException
     * @return array
     */
    function getPosts($param) {
        
        $this->new_pdo();
        $result = $this->getPdo()->query('SELECT p.id, p.user_id as userId, p.title, p.body FROM posts p;');
        $posts = $result->fetchAll(PDO::FETCH_CLASS, Post::class);
        
        return $posts;
    }
}

