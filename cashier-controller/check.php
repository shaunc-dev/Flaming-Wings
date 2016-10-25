<?php

session_start();

if (!isset($_SESSION["type"], $_SESSION["user_id"])) {
    session_destroy();
    echo 'false';
} else {
    if (!$_SESSION["type"] == 3) {
        session_destroy();
        echo 'false';
    }
}

?>