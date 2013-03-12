<?php
// Set up the database connection
$dsn = 'mysql:host=localhost;dbname=shop';
$username = 's_user';
$password = 'pa55word';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    display_error('Database error.');
    die($e->getMessage());
}