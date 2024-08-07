<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert Movie</title>
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

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];

        // Handle file upload
        $poster = "";
        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file is an image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $poster = basename($_FILES["fileToUpload"]["name"]);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO movies (title, genre, director, date, description, rating, poster) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $title, $genre, $director, $date, $description, $rating, $poster);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data inserted successfully";
            header('Location: display.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
