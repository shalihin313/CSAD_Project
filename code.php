<?php
session_start();
require 'connect.php';
              

if(isset($_GET['add']))
{
        $title = $_GET['title'];
        $genre = $_GET['genre'];
        $director = $_GET['director'];
        $date = $_GET['date'];
        $description = $_GET['description'];
        $rating = $_GET['rating'];
        $poster = $_GET['poster'];
        $query = "INSERT INTO movies (title, genre, director, date, description, rating, poster)
        VALUES ('$title', '$genre', '$director', '$date','$description', '$rating', '$poster')";
        echo $sql . "<p>";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Movies Added Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Failed to Add Movie";
        header("Location: create.php");
        exit(0);
    }
}

if(isset($_POST['delete_movies']))
{
    $movies_id = mysqli_real_escape_string($con, $_POST['delete_movies']);

    $query = "DELETE FROM movies WHERE id='$movies_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Movies Deleted Successfully";
        header("Location: display.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Failed to Delete Movie";
        header("Location: display.php");
        exit(0);
    }
}
if(isset($_POST['update']))
{
        $id = $_POST['id'];
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];
        $poster = $_POST['poster'];

    $query = "UPDATE movies SET title='$title', genre='$genre', director='$director', date='$date', description='$description', rating='$rating', poster='$poster'  WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Movie Updated Successfully";
        header("Location: display.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Failed to Update Movie";
        header("Location: display.php");
        exit(0);
    }

}
   





?>    