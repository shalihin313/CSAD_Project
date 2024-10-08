<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dynamic Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: black;
            color: red;
        }
        h1 {
            font-size: 100px;
            font-weight: bold;
        }
        h3 {
            font-size: 50px;
            color: red;
        }
        p {
            font-size: 30px;
            color: white;
        }
        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
            background-color: black;
        }
        .thumbnail img {
            width: 300px;
            height: 400px;
            margin-bottom: 10px;
        }
        img {
            display: block;
            margin-left: 80px;
            margin-right: auto;
            width: 35%;
        }
        .btn {
            padding: 20px 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"], 1);

    // Create connection
    $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    // Check connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Fetch movie data
    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);
    ?>
    <a href="index.php" class="btn btn-danger">Back to Home</a>
    <div class="container-fluid text-center bg-grey" id="poster">
        <h1>LATEST MOVIES</h1><br>
        <div class="row text-center">
            <?php
            if ($result->num_rows > 0) {
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    $imgSrc = htmlspecialchars($row['poster']); // Poster URL from the database
                    $title = htmlspecialchars($row['title']);
                    $description = htmlspecialchars($row['description']);

                    echo '<div class="col-sm-4">';
                    echo '<div class="thumbnail">';
                    echo "<img src=\"$imgSrc\" alt=\"movies\" width=\"400\" height=\"300\">";
                    echo "<h3>$title</h3>";
                    echo "<p>$description</p>";
                    echo '</div>';
                    echo '</div>';

                    $count++;
                    if ($count % 3 == 0) { // Create a new row after every 3 movies
                        echo '</div>';
                        echo '<div class="row text-center">';
                    }
                }
                echo '</div>'; // Close the last row
            } else {
                echo '<p>No movies found.</p>';
            }
            ?>
        </div>
    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>
