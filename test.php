<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 $user = 'admin_admin'; // пользователь
 $password = '33Acbac77'; // пароль
 $dbname = 'admin_heartmap'; // название бд
 $host = '45.12.19.33'; // хост

// $charset = 'utf8'; // кодировка

// Создаём подключение
// $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password); 
$db = new PDO('mysql:host=localhost;dbname=pdo', 'root', 'password');


// try {
// 	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password); 
// } catch (PDOException $e) {
// 	die($e->getMessage());
// }



?>