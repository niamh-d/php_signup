<?php

declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo '<div class="form-errors-container">';
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo '</div>';

        unset($_SESSION['errors_signup']);
    }
}