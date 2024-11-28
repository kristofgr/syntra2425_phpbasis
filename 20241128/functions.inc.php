<?php

function handleLogin()
{
    session_start();

    $loggedin = FALSE;

    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] > time()) {
            $loggedin = TRUE;
            $_SESSION['loggedin'] = time() + 3600;
        }
    }

    if (!$loggedin) {
        header("Location: login.php");
        exit;
    }
}
