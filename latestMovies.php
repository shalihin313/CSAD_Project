<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dynamic Bootstrap</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      
        <style>
             body{
            background-color: black;
            color:red;
             }
             h1{
                 font-size: 100px;
                 font-weight: bold;
             }
             h3{
                 font-size: 50px;
                 color: red;
             }
             p{
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
            .btn{
                padding: 20px 20px;
                font-size: 18px;
                font-weight: bold;
            }
          
            

        </style>
    </head>
    <body><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

?>
<a href="home.php" class="btn btn-danger">Back to Home</a>
<div class="container-fluid text-center bg-grey" id="poster">
    <h1>LATEST MOVIES</h1><br>
    <div class="row text-center">
        <?php
        $count = 0;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<div class="row text-center">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-sm-4">';
                echo '<div class="thumbnail">';
                echo '<img src="image\\' . $row['poster'] . '" alt="movies" width="400" height="300">';
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>' . $row['description'] . '</p>';
                echo '</div>';
                echo '</div>';
                $count++;
                if ($count == 3) {
                    echo '</div>';
                    echo '<div class="row text-center">';
                    $count = 0;
                }
            }
        }
        ?>
    </div>
</div>
<?php
$conn->close();
?>
    </body>
</html>
