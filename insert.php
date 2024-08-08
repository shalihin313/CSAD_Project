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
        $title = $_GET['title'];
        $genre = $_GET['genre'];
        $director = $_GET['director'];
        $date = $_GET['date'];
        $description = $_GET['description'];
        $rating = $_GET['rating'];
        $poster = $_GET['poster'];
        $sql = "INSERT INTO movies (title, genre, director, date, description, rating, poster)
        VALUES ('$title', '$genre', '$director', '$date','$description', '$rating', '$poster')";
        echo $sql . "<p>";

        if ($conn->query($sql) === TRUE) {
           //echo "New record created successfully";
           header('location:display.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </body>
</html>
