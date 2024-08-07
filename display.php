
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="addStyle.css">
</head>
<body>
    <h1>My Movies</h1>
    <div class="container">
        <button class="btn"><a href="add.php">Add Movies</a></button>
    </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="tableHeader" scope="col">#</th>
        <th class="tableHeader" scope="col">Title</th>
        <th class="tableHeader" scope="col">Genre</th>
        <th class="tableHeader" scope="col">Director</th>
        <th class="tableHeader" scope="col">Date</th>
        <th class="tableHeader" scope="col">Description</th>
        <th class="tableHeader" scope="col">Rating</th>
        <th class="tableHeader" scope="col">Poster</th>
        <th class="tableHeader" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        include 'serverData.php';
        $sql = "select * from `movies`";
        $result = mysqli_query($conn, $sql);
        
        if($result){
            //$row = mysqli_fetch_assoc($result);
           // echo $row['title'];
        }while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $title = $row['title'];
            $genre = $row['genre'];
            $director = $row['director'];
            $date = $row['date'];
            $description = $row['description'];
            $rating = $row['rating'];
            $poster = $row['poster'];
            
            echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$title.'</td>
                <td>'.$genre.'</td>
                <td>'.$director.'</td>
                <td>'.$date.'</td>
                <td>'.$description.'</td>
                <td>'.$rating.'</td>
                <td>'.$poster.'</td>
                    <td>
                    <button class="btn-success">
                    <a href="update.php?updateid='.$id.'">Update</a></button>
                    <button class="btn-danger">
                    <a href="delete.php?deleteid='.$id.'">Delete</a></button>
                    </td>
                 </tr>';
           
            
            
        }
                
        ?>
     
      </tr>
     
    </tbody>
  </table>
</div>

</body>
</html>
