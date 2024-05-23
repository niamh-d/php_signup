<?php

declare(strict_types=1);

function output_logout_link()
{
    if (isset($_SESSION['user_id'])) {
        echo "<a href='includes/logout.inc.php'>Logout</a>";
    }
}

function output_username()
{
    if (isset($_SESSION['user_id'])) {
        echo "You are logged in as " . $_SESSION['user_username'] . ".";
    } else {
        echo "You are not logged in.";
    }
}

function render_login_messages()
{
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }


        unset($_SESSION['errors_login']);
    } else if (isset($_GET['login']) && $_GET['login'] === 'success') {
        echo "<p class='success'>You have successfully logged in.</p>";
    }
}