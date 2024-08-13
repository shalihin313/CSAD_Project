
<?php
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

    <title>MOVIE LISTS</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Movie Details 
                            <a href="display.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $movies_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM movies WHERE id='$movies_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $movies = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Movie Title</label>
                                        <p class="form-control">
                                            <?= $movies['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Genre</label>
                                        <p class="form-control">
                                            <?= $movies['genre']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Director</label>
                                        <p class="form-control">
                                            <?= $movies['director']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Year of Release</label>
                                        <p class="form-control">
                                            <?= $movies['date']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Description</label>
                                        <p class="form-control">
                                            <?= $movies['description']; ?>
                                        </p>
                                    </div>
                                        <div class="mb-3">
                                        <label>Movie Rating</label>
                                        <p class="form-control">
                                            <?= $movies['rating']; ?>
                                        </p>
                                    </div>
                                        <div class="mb-3">
                                        <label>Poster</label>
                                        <p class="form-control">
                                            <?= $movies['poster']; ?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
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