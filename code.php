<?php
session_start();
require 'connect.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Function to handle errors
function handleError($message, $redirect) {
    $_SESSION['message'] = $message;
    header("Location: $redirect");
    exit(0);
}

// Check if 'add' action is set
if (isset($_GET['add'])) {
    $title = $_GET['title'];
    $genre = $_GET['genre'];
    $director = $_GET['director'];
    $date = $_GET['date'];
    $description = $_GET['description'];
    $rating = $_GET['rating'];
    $poster = $_GET['poster'];

    // Prepare and execute the insert query
    $query = "INSERT INTO movies (title, genre, director, date, description, rating, poster) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        handleError("Error preparing statement: " . mysqli_error($con), "create.php");
    }

    mysqli_stmt_bind_param($stmt, 'sssssss', $title, $genre, $director, $date, $description, $rating, $poster);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "Movie Added Successfully";
    } else {
        handleError("Failed to Add Movie: " . mysqli_stmt_error($stmt), "create.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    header("Location: create.php");
    exit(0);
}

// Check if 'delete_movies' action is set
if (isset($_POST['delete_movies'])) {
    $movies_id = $_POST['delete_movies'];

    // Prepare and execute the delete query
    $query = "DELETE FROM movies WHERE id=?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        handleError("Error preparing statement: " . mysqli_error($con), "display.php");
    }

    mysqli_stmt_bind_param($stmt, 'i', $movies_id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "Movie Deleted Successfully";
    } else {
        handleError("Failed to Delete Movie: " . mysqli_stmt_error($stmt), "display.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    header("Location: display.php");
    exit(0);
}

// Check if 'update' action is set
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $poster = $_POST['poster'];

    // Prepare and execute the update query
    $query = "UPDATE movies SET title=?, genre=?, director=?, date=?, description=?, rating=?, poster=? WHERE id=?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        handleError("Error preparing statement: " . mysqli_error($con), "display.php");
    }

    mysqli_stmt_bind_param($stmt, 'sssssssi', $title, $genre, $director, $date, $description, $rating, $poster, $id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "Movie Updated Successfully";
    } else {
        handleError("Failed to Update Movie: " . mysqli_stmt_error($stmt), "display.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    header("Location: display.php");
    exit(0);
}

// Handle case where no valid action is set
handleError("Invalid request.", "display.php");
?>
