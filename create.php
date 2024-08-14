<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: red;
        }
    </style>
    <title>Movies</title>
</head>
<body>
    <h1>Movie-GO</h1>
  
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ADD MOVIES
                            <a href="index.php" class="btn btn-danger float-end">BACK to HOME</a>
                            <a href="display.php" class="btn btn-success float-end">Movie Lists</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Movie Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Genre</label>
                                <input type="text" name="genre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Director</label>
                                <input type="text" name="director" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Year of Release</label>
                                <input type="text" name="date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Movie Rating</label>
                                <input type="text" name="rating" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Movie Poster URL</label>
                                <input type="url" name="poster" class="form-control" placeholder="Enter the URL of the movie poster" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="add" class="btn btn-primary">ADD Movie</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
