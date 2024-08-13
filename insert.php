<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert Movie</title>
    </head>
    <body>
        <?php
        // Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"],1);

        // Connect to DB
        $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO movie (title, genre, director, date, description, rating, poster)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $title, $genre, $director, $date, $description, $rating, $poster);

        // Set parameters and execute
        $title = $_GET['title'];
        $genre = $_GET['genre'];
        $director = $_GET['director'];
        $date = $_GET['date'];
        $description = $_GET['description'];
        $rating = $_GET['rating'];
        $poster = $_GET['poster'];

        if ($stmt->execute()) {
            // Redirect to display page
            header('location: display.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>

