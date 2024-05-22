<?php

$config = parse_ini_file("../config.ini", true);
$db_config = $config['database'];

try {
    $pdo = new PDO("mysql:host=" . $db_config['host'] . ";dbname=" . $db_config['dbname'], $db_config['user'], $db_config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}