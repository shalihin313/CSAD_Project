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
        $dbname = "mysql";

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
        $rating= $_GET['rating'];
        $sql = "INSERT INTO project (title, genre, director, date, rating)
        VALUES ('$title', '$genre', '$director', '$date', '$rating')";
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
