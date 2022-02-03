<?php
echo 'Init DB - mysqli' . PHP_EOL;

$user = 'root';
$pass = 'password';
$db_name = 'demo_app';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


echo 'Create database ..' . $db_name;
$mysqli = new mysqli("db", $user, $pass);
echo $mysqli->host_info . "\n";

$sql = "CREATE DATABASE $db_name";
if ($mysqli->query($sql) === TRUE) {
    echo "Database '$db_name' created successfully";
} else {
    echo "Error creating database: " . $mysqli->error;
    die();
    
}
$mysqli->close();


echo 'Create Schema ..';
$mysqli = new mysqli("db", $user, $pass, $db_name);

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

$mysqli->close();

echo 'Done.' . PHP_EOL;
