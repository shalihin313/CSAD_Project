<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url_for('static', filename='css/styles.css') }}">
     <Style>
        body{
            background-color: black; 
            color: white;
            }
         </style>
    <style>
        h1{
            color: red;
            font-size: 80px;
            font-weight: bold;
        }
        p{
            font-size: 20px;
        }
        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            
           padding: 20px;
            border-radius: 10px;
        }
        .team-member img {
            border-radius: 50%;
            margin-right: 20px;
            width: 180px;
            height: 180px;
            
           
        }
        .team-member h2 {
            margin: 0;
            font-size: 30px;
            color: red;
            font-weight: bold;
            font-style: italic;
        }
        .team-member p {
            margin: 5px 0;
            font-size: 20px;
        }
        .btn{
                padding: 20px 20px;
                font-size: 18px;
                font-weight: bold;
            }
    </style>
</head>
<body>
    
    <a href="index.php" class="btn btn-danger">Back to Home</a>
    <div class="container">
        
    <h1>About Us</h1>
    <p>This project was created by our team for learning purposes.</p>
    
    <div class="team-member">
        <img class="movie-list-item-image" src="image/photo1_.jpeg" alt="">
        
        <div>
            <h2>Muhammad Shalihin Ahmaddullah Ibnu Mohammad</h2>
            <p>Team Leader</p>
            <p>Sully Hin is responsible for the server-side logic and database
                integration.</p>
        </div>
    </div>

    <div class="team-member">
        <img class="movie-list-item-image" src="image/photo2.jpeg" alt="">
         
        <div>
            <h2>Romeo Ledesma Jr</h2>
            <p>Team Leader</p>
            <p>Romeo designed the user interface and worked on client-side
                functionalities.</p>
        </div>
    </div>

    <div class="team-member">
        <img class="movie-list-item-image" src="image/photo3.jpeg" alt="">
        
        <div>
            <h2>Billah Md Baki </h2>
            <p>Full Stack Developer</p>
            <p>Billah handled both frontend and backend development, ensuring
                seamless integration.</p>
        </div>
    </div>
        <div class="team-member">
        <img class="movie-list-item-image" src="image/photo4.jpeg" alt="">

        <div>
            <h2>Johny Kaung</h2>
            <p>Full Stack Developer</p>
            <p>Johny handled both frontend and backend development, ensuring
                seamless integration.</p>
        </div>
    </div>

</body>
</html>
