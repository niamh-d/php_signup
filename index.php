<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div>
        <h3>
            <?php
            output_username();
            ?>
        </h3>
        <p>
        <?php
        output_logout_link();
        ?>
        </p>
        </div>
        <?php
        if (!isset($_SESSION['user_id'])) { ?>
                    <div class="login">
                    <h3>Login</h3>

                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <button>Login</button>
                        <div class="form-messages-container">
                    <?php
                    render_login_messages();
                    ?>
                        </div>
             
                    </form>
                </div>
                <div class="signup">
                    <h3>Sign up</h3>

                    <form action="includes/signup.inc.php" method="post">
                    <?php
                    signup_inputs();
                    ?>
                   <button>Sign up</button>
                        <div class="form-messages-container">
                        <?php
                        render_signup_messages();
                        ?>
                    </div>
                    </form>
                </div>
       <?php } ?>
    </div>
</body>

</html>