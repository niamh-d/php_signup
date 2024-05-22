<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = 'Please fill in all fields.';
        }

        $user = get_user($pdo, $username);

        if (is_username_wrong($user)) {
            $errors["login_incorrect"] = 'Incorrect login credentials.';
        }

        if (!is_username_wrong($user) && is_password_wrong($password, $user['password'])) {
            $errors["login_incorrect"] = 'Incorrect login credentials.';
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_login'] = $errors;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $user['id'];
        session_id($sessionId);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_username'] = htmlspecialchars($user['username']);
        $_SESSION['user_email'] = htmlspecialchars($user['email']);

        $_SESSION["last_regenerated"] = time();

        header("Location: ../index.php?login=success");

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