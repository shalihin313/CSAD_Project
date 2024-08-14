<?php
session_start();
require 'connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
    <title>Edit Movies</title>
</head>
<body>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Movie List 
                        <a href="display.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $movies_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM movies WHERE id='$movies_id'";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $movies = mysqli_fetch_array($query_run);
                    ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $movies['id']; ?>">

                                <div class="mb-3">
                                    <label>Movie Title</label>
                                    <input type="text" name="title" value="<?= $movies['title']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Genre</label>
                                    <input type="text" name="genre" value="<?= $movies['genre']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Director</label>
                                    <input type="text" name="director" value="<?= $movies['director']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Year of Release</label>
                                    <input type="text" name="date" value="<?= $movies['date']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" name="description" value="<?= $movies['description']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Movie Rating</label>
                                    <input type="text" name="rating" value="<?= $movies['rating']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Movie Poster (URL)</label>
                                    <input type="text" name="poster" value="<?= $movies['poster']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update" class="btn btn-primary">Update Movies</button>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
