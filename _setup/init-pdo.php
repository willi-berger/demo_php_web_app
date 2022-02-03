<?php
echo 'Init DB' . PHP_EOL;

$user = 'root';
$pass = 'password';
$dbh = new PDO('mysql:host=my-mariadb;dbname=testdb', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $dbh->exec(<<<SQL
CREATE TABLE test5 (
id INT,
field2 VARCHAR(16))
INDEX id;
SQL
);
} catch (Eception $e) {
    echo $e->getMessage();
}

$dbh = null;
echo 'done ';