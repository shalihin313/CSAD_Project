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
        
        <Style>
        body{
            background-color: black;
            color:red;
            
            }
         </style>
        
        
        <title>Movies</title>
    </head>
    <body>
        <h1 class>Movie-GO </h1>

        <div class="container mt-4">

            <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Movie List Details
                                <a href="index.php" class="btn btn-danger float-end">Back to Home</a>
                                <a href="create.php" class="btn btn-primary float-end">Add Movies</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Movie Title</th>
                                        <th>Genre</th>
                                        <th>Director</th>
                                        <th>Year of Release</th>
                                        <th>Description</th>
                                        <th>Rating</th>
                                        <th>Movie Poster</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM movies";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $movies) {
                                            ?>
                                            <tr>
                                                <td><?= $movies['id']; ?></td>
                                                <td><?= $movies['title']; ?></td>
                                                <td><?= $movies['genre']; ?></td>
                                                <td><?= $movies['director']; ?></td>
                                                <td><?= $movies['date']; ?></td>
                                                <td><?= $movies['description']; ?></td>
                                                <td><?= $movies['rating']; ?></td>
                                                <td><?= $movies['poster']; ?></td>
                                                <td>
                                                    <a href="view.php?id=<?= $movies['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="edit.php?id=<?= $movies['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_movies" value="<?= $movies['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
        <?php
    }
} else {
    echo "<h5> No Record Found </h5>";
}
?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>