<?php

define('INTERVAL', 60 * 30);

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params(
    [
        'lifetime' => INTERVAL,
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true
    ]
);

session_start();

if (!isset($_SESSION['last_regenerated'])) {
    regenerate_session_id();
} else {
    if (time() - $_SESSION["last_regenerated"] >= INTERVAL) {
        regenerate_session_id();
    }
}

function regenerate_session_id()
{
    session_regenerate_id();
    $_SESSION["last_regenerated"] = time();
}