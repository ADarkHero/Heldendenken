<?php

$db_host = 'localhost';
$db_name = 'heldendenken';
$db_user = 'root';
$db_password = '';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);