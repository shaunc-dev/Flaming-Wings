<?php

require("connect.php");
$types = array();
$types["type"] = array();

$result = $connect->query("select * from recipetype") or die ($connect-error);


?>