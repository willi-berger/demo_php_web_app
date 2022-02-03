<?php
echo 'Init DB - mysqli' . PHP_EOL;

$user = 'root';
$pass = 'password';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("my-mariadb", $user, $pass, "testdb");

echo $mysqli->host_info . "\n";

$result = $mysqli->query(<<<SQL
SELECT p.id, p.user_id, p.title, p.body FROM posts p;
SQL
);

var_dump($result);

for ($i = 0; $i < $result->num_rows; $i++) {
    
    $row = $result->fetch_assoc();
    var_dump($row);
    break;
}

class Post {
    
    protected $id;
    protected $user_id;
    protected $title;
    protected $body;
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    function __construct ($payload)
    {
        if (is_array($payload))
            $this->from_array($payload);
    }
    
    
    public function from_array($array)
    {
        foreach(get_object_vars($this) as $attrName => $attrValue)
            $this->{$attrName} = $array[$attrName];
    }
    
    
}


for ($i = 0; $i < $result->num_rows; $i++) {
    
    $row = $result->fetch_assoc();
    $post = new Post($row);
    
    var_dump($post->getTitle());
    break;
}