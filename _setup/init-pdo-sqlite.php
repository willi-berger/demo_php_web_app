<?php
echo 'Init DB' . PHP_EOL;

$user = 'root';
$pass = 'password';
$dbh = new PDO('sqlite:mydb.sq3', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $dbh->exec(<<<SQL
CREATE TABLE IF NOT EXISTS `posts` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `user_id` INTEGER NOT NULL,
  `title` varchar(164) NOT NULL,
  `body` text NOT NULL
);
SQL
);
    
    
$dbh->exec(<<<SQL
INSERT 
    into posts (user_id, title, body) 
VALUES
    (1, 'at nam consequatur ea labore ea harum', 'cupiditate quo est a modi nesciunt soluta ipsa voluptas error itaque dicta in nautem qui minus magnam et distinctio eum accusamus ratione error aut'),
    (1, 'at nam consequatur ea labore ea harum', 'cupiditate quo est a modi nesciunt soluta ipsa voluptas error itaque dicta in nautem qui minus magnam et distinctio eum accusamus ratione error aut')

SQL
        );
    
} catch (Eception $e) {
    echo $e->getMessage();
}

$dbh = null;
echo 'done ';