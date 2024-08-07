<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
        if(isset($_POST['submit'])){
            
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $director = $_POST['director'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $rating= $_POST['rating'];
            $poster= $_POST['poster'];
            
            $sql = "INSERT INTO movies (title, genre, director, date, description, rating, poster)
        VALUES ('$title', '$genre', '$director', '$date','$description', '$rating', '$poster')";
            
            if($result){
                echo "data insert successfully";
            }else{
                die(mysqli_error($conn));
            }
            
        }
        
      ?> 
        