<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <title>Movie Design</title>
    </head>

    <body>
        <div class="navbar">
            <div class="navbar-container">
                <div class="logo-container">
                    <div class="logo">Movie-GO</div>
                </div>
                <div class="menu-container">
                    <ul class="menu-list">
                        <li class="menu-list-item active">Home</li>
                        <li type="button" class="menu-list-item"><a href="latestMovies.php">Latest Movies</a></li>
                        <li type="button" class="menu-list-item"><a href="create.php">Add Movies</a></li>
                        <li type="button" class="menu-list-item"><a href="display.php">Edit Movie</a></li>
                        <li type="button" class="menu-list-item"><a href="about.php">About Us</a></li>

                    </ul>
                </div>
                <div class="profile-container">
                    <img class="profile-picture" src="image/profile.jpg" alt="">
                    <div class="profile-text-container">
                        <span class="profile-text">Profile</span>
                        <i class="fa-solid fa-square-caret-down"></i>
                    </div>
                    <div class="toggle">
                        <div class="toggle-ball">

                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="sidebar">
            <i class="left-menu-icon fa-solid fa-house-user"></i>
            <i class="left-menu-icon fa-solid fa-magnifying-glass"></i>
            <i class="left-menu-icon fa-solid fa-users"></i>
            <i class="left-menu-icon fa-regular fa-bookmark"></i>
        </div>
        <div class="container">
            <div class="content-container">
                <div class="featured-content"
                     style="background: url('image/ft-1.jpeg');">
                    <p class="featured-description">Frank Moses and his friend Marvin find themselves being tracked down by a team of assassins led by Jack Horton, who are on a quest to find information about a nuclear weapon they smuggled to Russia.</p>
                    <button onclick="window.location.href='https://ww4.fmovies.co/film/red-2-2138/';"  class="featured-button">WATCH NOW</button>
                </div>
                <div class="movie-list-container">
                    <h1 class="movie-list-title">COMING SOON</h1>
                    <div class="movie-list-wrapper">
                        <div class="movie-list">
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/15.jpg" alt="">
                                <span class="movie-list-item-title">Venom</span>
                                <button onclick="window.location.href='https://www.youtube.com/watch?v=__2bjWbetsA';" class="movie-list-item-button">WATCH TRAILER</button>
                               
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/16.jpg" alt="">
                                <span class="movie-list-item-title">Joker</span>
                               
                                <button onclick="window.location.href='https://www.youtube.com/watch?v=xy8aJw1vYHo';" class="movie-list-item-button">WATCH TRAILER</button>
                                        
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/17.jpg" alt="">
                                <span class="movie-list-item-title">Borderlands</span>
                                <button onclick="window.location.href='https://www.youtube.com/watch?v=lU_NKNZljoQ';" class="movie-list-item-button">WATCH TRAILER</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/14.jpg" alt="">
                                <span class="movie-list-item-title">TransformerONE</span>
                                <button onclick="window.location.href='https://www.youtube.com/watch?v=u2NuUWuwPCM';" class="movie-list-item-button">WATCH TRAILER</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/18.jpg" alt="">
                                <span class="movie-list-item-title">Gladiator II</span>
                                <button onclick="window.location.href='https://www.youtube.com/watch?v=4rgYUipGJNo';" class="movie-list-item-button">WATCH TRAILER</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/19.jpg" alt="">
                                <span class="movie-list-item-title">Trap</span>
                               <button onclick="window.location.href='https://www.youtube.com/watch?v=hJiPAJKjUVg';" class="movie-list-item-button">WATCH TRAILER</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/20.jpg" alt="">
                                <span class="movie-list-item-title">Moana 2</span>
                                <button onclick="window.location.href='https://www.youtube.com/watch?v=qkgkUCqEum4';" class="movie-list-item-button">WATCH TRAILER</button>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right arrow"></i>
                    </div>

                </div>
                <div class="movie-list-container">
                    <h1 class="movie-list-title">MOVIES</h1>
                    <div class="movie-list-wrapper">
                        <div class="movie-list">
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/9.jpg" alt="">
                                <span class="movie-list-item-title">Equalizer 3</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/the-equalizer-3-1630855692/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/10.jpg" alt="">
                                <span class="movie-list-item-title">Fast X</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/fast-x-1630855180/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/5.jpg" alt="">
                                <span class="movie-list-item-title">Meg</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/the-meg-25819/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/12.jpg" alt="">
                                <span class="movie-list-item-title">Avatar</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/avatar-4318/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/13.jpg" alt="">
                                <span class="movie-list-item-title">Ghostbusters</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/ghostbusters-afterlife-1630852052/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/8.jpg" alt="">
                                <span class="movie-list-item-title">The Marvels</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/the-marvels-1630856042/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                            <div class="movie-list-item">
                                <img class="movie-list-item-image" src="image/11.jpg" alt="">
                                <span class="movie-list-item-title">Blue Beetle</span>
                                <button onclick="window.location.href='https://ww4.fmovies.co/film/blue-beetle-1630855630/';" class="movie-list-item-button">WATCH NOW</button>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-right arrow"></i>
                    </div>
                </div>
            </div>
        </div>
        <script src="home-code.js"></script>
    </body>

</html>
