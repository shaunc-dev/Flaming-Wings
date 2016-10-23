<?php

require("connect.php");
$status = "false";

if (isset($_POST["password"])) {
    $password = $_POST["password"];
    $result = $connect->query("select password from users where user_type_id = '2'");

    if (!$result) {
        $status = $connect->error;
    } else {
        while ($row = $result->fetch_assoc()) {
            if ($row["password"] == $password) {
                $status = "true";
                break;
            }
        }
    }

    $connect->close();

}

echo $status;

?>