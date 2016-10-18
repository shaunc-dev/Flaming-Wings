<?php

class Model {
    private $connect;

    public function __construct() {
        this.$connect = new mysqli("localhost:3306", "root", "", "flamingwings");
    }

    public function insertToDatabase($tablename) {
        
    }
}

?>