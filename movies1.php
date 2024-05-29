<?php
require_once('db_config.php');
session_start();
// Check if user is logged in
if (!isset($_SESSION['username']) || $_SESSION['loggedin'] !== true)  {
    // Redirect to login page or handle unauthorized access
    header('Location: login.php');
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>
    <link rel="stylesheet" href="styles1.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="header">
        <h1>CiniScore</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!&nbsp;&nbsp;&nbsp;<input type="button" class="button logout" value="Logout" onclick="window.location.href='logout.php'"></p>

        </div>
        
     <div class="container">
        
        <div class="movies">
            <!-- Movie 1 -->
            <div class="movie">
                <a href="https://youtu.be/AHuOo1DLcRc?si=MH3ls7rjHUuiMwwc"><img src="dilwale.jpg" alt="Movie 2"></a>
                <div class="details">
                   
                    <h2>Dilwale</h2>
                    <p>Movie ID: 1</p>
                    <p>Director: Aditya Chopra</p>
                    <p>Year: 2020</p>
                    <p>Rating: 2</p>
                    <p>Comments: Not good</p>
                </div>
            </div>
            <div class="movie">
                <a href="https://youtu.be/K0eDlFX9GMc?si=7VchD39RJbWZ29C6"><img src="idiot.jpg" alt="Movie 1"></a>
                <div class="details">
                    <h2>3 Idiots</h2>
                    <p>Movie ID: 2</p>
                    <p>Director: Rajkumar</p>
                    <p>Year: 2019</p>
                    <p>Rating: 3</p>
                    <p>Comments: Ok</p>
                </div>
            </div>
            <!-- Movie 2 -->
            <div class="movie">
                <a href="https://youtu.be/Nhi4Azs2nEw?si=smz0JXDBvXHQ8SLw"><img src="lagaan.jpeg" alt="Movie 2"></a>
                <div class="details">
                    <h2>Lagaan</h2>
                    <p>Movie ID: 3</p>
                    <p>Director: Ashuthosh</p>
                    <p>Year: 2018</p>
                    <p>Rating: 4</p>
                    <p>Comments: Excellent</p>
                </div>
            </div>
            <div class="movie">
                <a href="https://youtu.be/JfbxcD6biOk?si=20HZ6w9nseiK1Xo7"><img src="gullyboy.jpg" alt="Movie 2"></a>
                <div class="details">
                    <h2>Gully Boy</h2>
                    <p>Movie ID: 4</p>
                    <p>Director: Zoya</p>
                    <p>Year: 2017</p>
                    <p>Rating: 4</p>
                    <p>Comments: Excellent</p>
                </div>
            </div>
            <div class="movie">
                <a href="https://youtu.be/zzTUvWfvlBg?si=oekMWiCWo5hKT753"><img src="sholay.jpg" alt="Movie 2"></a>
                <div class="details">
                    <h2>Sholay</h2>
                    <p>Movie ID: 5</p>
                    <p>Director: Ramesh</p>
                    <p>Year: 2016</p>
                    <p>Rating: 5</p>
                    <p>Comments: Must Watch movie</p>
                </div>
            </div>
            <div class="movie">
                <a href="https://youtu.be/SOXWc32k4zA?si=RY_pG5_X9hC3ThVV"><img src="pk.jpg" alt="Movie 2"></a>
                <div class="details">
                    <h2>PK</h2>
                    <p>Movie ID: 6</p>
                    <p>Director: Rajkumar</p>
                    <p>Year: 2015</p>
                    <p>Rating: 2</p>
                    <p>Comments: Don't watch</p>
                </div>
            </div>
            <!-- Add more movies here -->
            
            <div class="movie">
               <a href="https://youtu.be/KGC6vl3lzf0?si=qNCxfajY44YqWFSi"> <img src="queen.jpg" alt="Movie 2"></a>
                <div class="details">
                    <h2>Queen</h2>
                    <p>Movie ID: 7</p>
                    <p>Director: Vikas</p>
                    <p>Year: 2014</p>
                    <p>Rating: 3</p>
                    <p>Comments: Ok</p>
                </div>
            </div>
            <div class="movie">
               <a href="https://youtu.be/F-PAI2HnQUo?si=FsDg6E7HnNM61uGg"> <img src="tarezameen.jpg" alt="Movie 2"></a>
                <div class="details">
                    <h2>Tare Zameen Par</h2>
                    <p>Movie ID: 8</p>
                    <p>Director: Amir Khan</p>
                    <p>Year: 2013</p>
                    <p>Rating: 2</p>
                    <p>Comments: Not nice</p>
                </div>
            </div>
            <div class="movie">
               <a href="https://youtu.be/2iVYI99VGaw?si=zs5QicRnGY6hBGMe"> <img src="andhadhun.jpg" alt="Movie 2"></a>
                <div class="details">
                    <h2>Andhadhun</h2>
                    <p>Movie ID: 9</p>
                    <p>Director: Karan</p>
                    <p>Year: 20212</p>
                    <p>Rating: 3</p>
                    <p>Comments: Fine</p>
                </div>
            </div>
            <div class="movie">
               <a href="https://youtu.be/7uY1JbWZKPA?si=W5Mq2Rp2EqL050_O"> <img src="kabhi.jpg" alt="Movie 2"></a>
                <div class="details">
                    
                   
                    <h2>Kabhi Kushi<h2>
                         <p>Movie ID: 10</p>
                        <p>Director: Karan</p>
                    <p>Year: 2011</p>
                    <p>Rating: 1</p>
                    <p>Comments: Don't watch</p>
                </div>
            </div>
        </div>
    </div>
   
   <hr>
    <h1>Search for Movies</h1>
    <form action="movies.php" method="POST">
        <label for="movie_id"><b>&nbsp;&nbsp;Movie ID:&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" id="movie_id" name="movie_id"><br><br>
        <label for="movie_title"><b>&nbsp;&nbsp;Movie Title:&nbsp;</b></label>
        <input type="text" id="movie_title" name="movie_title"><br><br>

	    <label for="rating"><b>&nbsp;&nbsp;Rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" id="rating" name="rating"><br><br>
	
        &nbsp; <button type="submit">Search</button>
    </form><br><br>
    <h1>What do you think about the movie you recently watched??</h1>
    <p>&nbsp;&nbsp;Feel free to share your review</p>
    &nbsp;&nbsp;<button onclick="window.location.href='review.html'"><b>Add Review</b></button><br><br>

<div class="footer">
    <p>&copy; 2024 CiniScore</p>
</div>
</body>
</html>