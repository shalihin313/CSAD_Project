
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="addStyle.css">
    </head>
    <body>
        <form method="get" action="insert.php" data-netlify="true">
            <div class="add-grp">
                <h1> MOVIES</h1>
            <div class="add-grp-label">
                <label>Title</label>
            <input class="add-grp-input" type="text" name="title" placeholder="Enter Movie Title">
           </div>
            <div class="add-grp-label">
            <label>Genre</label>
                <input class="add-grp-input" type="text" name="genre" placeholder="Enter Movie Genre">
           </div>
            <div class="add-grp-label">
            <label>Director</label>
                <input class="add-grp-input" type="text" name="director" placeholder="Enter Director">
           </div>
            <div class="add-grp-label">
            <label>Year of Release</label>
                <input class="add-grp-input" type="number" name="date" placeholder="Enter Realease Year">
            </div>
                <div class="add-grp-label">
            <label>Description</label>
                <input class="add-grp-input" type="text" name="description" placeholder="Enter Description">
           </div>
            <div class="add-grp-label">
            <label>Rating</label>
                <input class="add-grp-input" type="number" name="rating" placeholder="Enter Rating">
           </div>
                <div class="add-grp-label">
            <label>Poster</label>
<!--                <input class="add-grp-input" type="text" name="rating" placeholder="Enter Poster">-->
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </div>
                
                <input class="insert" type="submit" value="ADD" action="sample.php">
            
            </div>
        </form>
    </body>
</html>
<?php
$target_dir = "my_db";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["poster"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>
