<?php

session_start();

if (!isset($_SESSION["type"], $_SESSION["user_id"])) {
    unset($_SESSION["type"], $_SESSION["user_id"]);
    session_destroy();
    echo 'false';
} else {
    if (!($_SESSION["type"] == 3) || !($_SESSION["type"] == 2)) {
        unset($_SESSION["type"], $_SESSION["user_id"]);
        session_destroy();
        echo 'false';
    }
}

?>