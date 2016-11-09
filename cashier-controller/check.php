<?php

session_start();

if (!isset($_SESSION["type"], $_SESSION["user_id"])) {
    unset($_SESSION["type"], $_SESSION["user_id"]);
    session_destroy();
    echo 'false';
} else {
<<<<<<< HEAD
    if (!($_SESSION["type"] == 3) || !($_SESSION["type"] == 2)) {
=======
    if (!$_SESSION["type"] == 3 || !$_SESSION["type"] == 2) {
>>>>>>> feature_cashier
        unset($_SESSION["type"], $_SESSION["user_id"]);
        session_destroy();
        echo 'false';
    }
}

?>