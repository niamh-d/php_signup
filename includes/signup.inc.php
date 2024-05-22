<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];


        if (is_input_empty($username, $password, $email)) {
            $errors["empty_input"] = 'Please fill in all fields.';
        }
        if (is_email_invalid($email)) {
            $errors['invalid_email'] = 'Please enter a valid email address.';

        }
        if (is_username_taken($pdo, $username)) {
            $errors['username_taken'] = 'This username is already taken.';

        }

        if (is_email_registered($pdo, $email)) {
            $errors['email_taken'] = 'This email is already registered.';
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $username, $password, $email);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    die();
}