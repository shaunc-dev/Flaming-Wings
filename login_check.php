<?php

if (!isset($_SESSION["user_id"])) {
    session_destroy();
    unset($_SESSION);
    header("log_in.php");
}

?>