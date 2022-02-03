<?php
echo 'Init DB - mysqli' . PHP_EOL;

$user = 'root';
$pass = 'password';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("db", $user, $pass, "testdb");

echo $mysqli->host_info . "\n";

$mysqli->query(<<<SQL
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(164) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL
);

$mysqli->query(<<<SQL
INSERT 
    into posts (user_id, title, body) 
VALUES
    (1, 'at nam consequatur ea labore ea harum', 'cupiditate quo est a modi nesciunt soluta ipsa voluptas error itaque dicta in nautem qui minus magnam et distinctio eum accusamus ratione error aut'),
    (1, 'at nam consequatur ea labore ea harum', 'cupiditate quo est a modi nesciunt soluta ipsa voluptas error itaque dicta in nautem qui minus magnam et distinctio eum accusamus ratione error aut')
SQL
);