<?php
namespace Demo\Model\DataObject;
/**
 * Class Post
 * 
 * note: making the properties public, we can use json_encode on objects of this class, ang get all public values serialized
 */
class Post
{
    /**
     * @var string
     */
    const TABLE_NAME = 'posts';
    
    public function __construct()
    {       
        settype($this->id, 'int');
        settype($this->userId, 'int');
    }
    
    /**
     * 
     * @var int
     */
    public $id;
    
    /**
     * 
     * @var int
     */
    public $userId;
    
    /**
     * @var string
     */
    public $title;
    
    /**
     * 
     * @var string
     */
    public $body;
    
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return number
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param number $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param number $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
    
}

