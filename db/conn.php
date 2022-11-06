<?php

//Development Connection
//$host = 'localhost';
//$db = 'attendance';
//$user = 'root';
//$pass = '';
//$charset = 'utf8mb4';

//$host = 'remotemysql.com';
//$db = 'jdjXdoiruy';
//$user = 'jdjXdoiruy';
//$pass = '3zFvp7DSjF';
//$charset = 'utf8mb4';

$host = 'applied-web.mysql.database.azure.com';
$db = 'attendance_coke';
$user = 'appliedweb_user@applied-web';
$pass = 'P@ssword1';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    throw new PDOException($e->getMessage());
}
require_once 'crud.php';
$crud = new crud($pdo);

?>