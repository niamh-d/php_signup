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

if (isset($_SESSION['user_id'])) {
    if (!isset($_SESSION['last_regenerated'])) {
        regenerate_session_id_logged_in();
    } else {
        if (time() - $_SESSION["last_regenerated"] >= INTERVAL) {
            regenerate_session_id_logged_in();
        }
    }
} else {
    if (!isset($_SESSION['last_regenerated'])) {
        regenerate_session_id();
    } else {
        if (time() - $_SESSION["last_regenerated"] >= INTERVAL) {
            regenerate_session_id();
        }
    }
}


function regenerate_session_id()
{
    session_regenerate_id(true);

    $userId = $_SESSION['user_id'];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);


    $_SESSION["last_regenerated"] = time();
}

function regenerate_session_id_logged_in()
{
    session_regenerate_id(true);
    $_SESSION["last_regenerated"] = time();
}