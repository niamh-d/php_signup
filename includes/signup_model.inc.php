<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT username FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $password, string $email)
{
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12,
    ];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}