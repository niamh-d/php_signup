<?php

$config = parse_ini_file(dirname(__FILE__) . "/../config.ini", true);

try {
    $pdo = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['user'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}