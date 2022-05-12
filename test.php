<?php
  phpinfo();

$user = 'admin_admin'; // пользователь

$password = '33Acbac77'; // пароль

$db = 'admin_heartmap'; // название бд

$host = '45.12.19.33'; // хост

$charset = 'utf8'; // кодировка

// Создаём подключение

$pdo = new PDO("mysql:host=$host;dbname=$db;cahrset=$charset", $user, $password);

try {
	$dbh = new PDO('mysql:dbname=db_name;host=localhost', 'логин', 'пароль');
} catch (PDOException $e) {
	die($e->getMessage());
}



?>