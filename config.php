<?php



 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$db = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}