<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Movie</title>
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
            $rating = $_POST['rating'];
            $poster = $_POST['poster'];

            $sql = "INSERT INTO movie (title, genre, director, date, description, rating, poster) 
                    VALUES ('$title', '$genre', '$director', '$date', '$description', '$rating', '$poster')";

            // Execute the query and check for success
            if (mysqli_query($conn, $sql)) {
                echo "Data inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        $conn->close(); // Close the database connection
        ?>