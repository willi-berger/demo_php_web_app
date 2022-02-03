<?php
require __DIR__ . '/../vendor/autoload.php';

use Demo\Model\DataObject\Post;

echo 'Init DB' . PHP_EOL;


$dbh = new PDO('sqlite:mydb.sq3');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $result = $dbh->query('SELECT p.id, p.user_id as userId, p.title, p.body FROM posts p;');
    
    $result = $result->fetchAll(PDO::FETCH_CLASS, Post::class);
    
    foreach ($result as $r) {
        var_dump($r->id);
        var_dump(json_encode($r));
        break;
    }
    
} catch (Eception $e) {
    echo $e->getMessage();
}



$dbh = null;
echo 'done ';