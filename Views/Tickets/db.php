<?php
$dsn = 'mysql:host=localhost;dbname=cliptec';
$username = 'admin';
$password = 'admin';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
?>