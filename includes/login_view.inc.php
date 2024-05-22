<?php

declare(strict_types=1);

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