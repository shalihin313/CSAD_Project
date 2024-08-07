<?php

$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my_db";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    
    $sql = "delete from `movies` where id=$id";
    $result = mysqli_query($conn, $sql);
    
    
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>