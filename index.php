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
        <div class="login">
            <h3>Login</h3>

            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button>Login</button>
            </form>
        </div>
        <div class="signup">
            <h3>Sign up</h3>

            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="text" name="email" placeholder="Email">
                <button>Sign up</button>
        </div>
    </div>
</body>

</html>