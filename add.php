<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Movie</title>
    <link rel="stylesheet" type="text/css" href="addStyle.css">
</head>
<body>
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="add-grp">
            <h1>MOVIES</h1>
            <div class="add-grp-label">
                <label>Title</label>
                <input class="add-grp-input" type="text" name="title" placeholder="Enter Movie Title" required>
            </div>
            <div class="add-grp-label">
                <label>Genre</label>
                <input class="add-grp-input" type="text" name="genre" placeholder="Enter Movie Genre" required>
            </div>
            <div class="add-grp-label">
                <label>Director</label>
                <input class="add-grp-input" type="text" name="director" placeholder="Enter Director" required>
            </div>
            <div class="add-grp-label">
                <label>Year of Release</label>
                <input class="add-grp-input" type="number" name="date" placeholder="Enter Release Year" required>
            </div>
            <div class="add-grp-label">
                <label>Description</label>
                <input class="add-grp-input" type="text" name="description" placeholder="Enter Description" required>
            </div>
            <div class="add-grp-label">
                <label>Rating</label>
                <input class="add-grp-input" type="number" name="rating" placeholder="Enter Rating" required>
            </div>
            <div class="add-grp-label">
                <label>Poster</label>
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
            <input class="insert" type="submit" name="submit" value="ADD">
        </div>
    </form>
</body>
</html>
