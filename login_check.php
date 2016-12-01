<?php

if (!isset($_SESSION["user_id"])) {
    session_destroy();
    unset($_SESSION);
    header("Location: log_in.php");
}

?>