
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="addStyle.css">
    </head>
    <body>
        
        <form method="get" action="insert.php">
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
            <label>Upload Movie Poster</label>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="poster" id="poster">
                <input type="submit" value="Upload Image" name="submit">
            </div>
                
                <input class="insert" type="submit" value="ADD" action="sample.php">
            
            </div>
        </form>
    </body>
</html>

