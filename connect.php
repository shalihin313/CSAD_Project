<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my_db";

// Create connection
        $con = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }