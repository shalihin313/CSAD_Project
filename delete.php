<?php
session_start();

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
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Validate that $id is a number
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        // Use prepared statements for security
        $stmt = $conn->prepare("DELETE FROM movies WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        if ($result) {
            $_SESSION['message'] = "Movie deleted successfully";
        } else {
            $_SESSION['message'] = "Failed to delete the movie. Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Invalid movie ID.";
    }
} else {
    $_SESSION['message'] = "No movie ID provided.";
}

$conn->close();

header('Location: display.php');
exit();

    }
}

$conn->close();

?>
