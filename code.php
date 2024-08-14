<?php
session_start();
require 'connect.php';

use Github\Client;

require 'vendor/autoload.php';

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

// GitHub repository details
$githubUsername = 'shalihin313';
$githubRepo = 'CSAD_project';
$githubFolder = '';
$githubToken = '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'; // Replace with your GitHub PAT

// Check if 'add' action is set
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $release_date = $_POST['date'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    // Handle the poster file upload
    $poster = null;
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] == UPLOAD_ERR_OK) {
        $filePath = $_FILES['poster']['tmp_name'];
        $fileName = basename($_FILES["poster"]["name"]);

        // Initialize GitHub Client
        $client = new Client();
        $client->authenticate($githubToken, null, Client::AUTH_ACCESS_TOKEN);

        // Read the file content
        $fileContent = base64_encode(file_get_contents($filePath));

        // Create a new file in the repository
        try {
            $client->repo()->contents()->create(
                $githubUsername,
                $githubRepo,
                "$githubFolder/$fileName",
                $fileContent,
                "Add $fileName via PHP form",
                'main'
            );
            $poster = $fileName; // Save the filename to the database
        } catch (Exception $e) {
            handleError("Failed to upload poster to GitHub: " . $e->getMessage(), "create.php");
        }
    }

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
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["poster"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file
        $check = getimagesize($_FILES["poster"]["tmp_name"]);
        if ($check === false || $_FILES["poster"]["size"] > 5000000 || !in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            handleError("Invalid file or file size too large.", "display.php");
        } else {
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
                $poster = basename($_FILES["poster"]["name"]);
            } else {
                handleError("Sorry, there was an error uploading your file.", "display.php");
            }
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
