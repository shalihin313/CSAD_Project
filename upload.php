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
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $release_date = $_POST['date'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    // Handle the poster file upload
    $target_dir = "image/";  // Directory where the file will be uploaded
    $target_file = $target_dir . basename($_FILES["poster"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["poster"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        handleError("File is not an image.", "create.php");
        $uploadOk = 0;
    }

    // Check file size (e.g., max 5MB)
    if ($_FILES["poster"]["size"] > 5000000) {
        handleError("Sorry, your file is too large.", "create.php");
        $uploadOk = 0;
    }

    // Allow certain file formats (e.g., jpg, png, jpeg, gif)
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        handleError("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", "create.php");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        handleError("Sorry, your file was not uploaded.", "create.php");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
            $poster = basename($_FILES["poster"]["name"]); // Save the filename in the database

            // Prepare and execute the insert query
            $query = "INSERT INTO movies (title, genre, director, release_date, description, rating, poster) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);

            if ($stmt === false) {
                handleError("Error preparing statement: " . mysqli_error($con), "create.php");
            }

            mysqli_stmt_bind_param($stmt, 'sssssss', $title, $genre, $director, $release_date, $description, $rating, $poster);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['message'] = "Movie Added Successfully";
            } else {
                handleError("Failed to Add Movie: " . mysqli_stmt_error($stmt), "create.php");
            }

            mysqli_stmt_close($stmt);
            mysqli_close($con);
            header("Location: create.php");
            exit(0);
        } else {
            handleError("Sorry, there was an error uploading your file.", "create.php");
        }
    }
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
    $release_date = $_POST['date'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    // Handle the poster file upload (if new file uploaded)
    if ($_FILES["poster"]["name"]) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["poster"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file
        $check = getimagesize($_FILES["poster"]["tmp_name"]);
        if($check !== false && $_FILES["poster"]["size"] <= 5000000 && in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
                $poster = basename($_FILES["poster"]["name"]);
            } else {
                handleError("Sorry, there was an error uploading your file.", "display.php");
            }
        } else {
            handleError("Invalid file or file size too large.", "display.php");
        }
    } else {
        $poster = $_POST['current_poster']; // Keep the current poster if no new file uploaded
    }

    // Prepare and execute the update query
    $query = "UPDATE movies SET title=?, genre=?, director=?, release_date=?, description=?, rating=?, poster=? WHERE id=?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        handleError("Error preparing statement: " . mysqli_error($con), "display.php");
    }

    mysqli_stmt_bind_param($stmt, 'sssssssi', $title, $genre, $director, $release_date, $description, $rating, $poster, $id);

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
