<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

require_once('db_config.php');

// Define variables and initialize with empty values
$title = $director = $release_year = $rating = $comment = $url = "";
$title_err = $director_err = $release_year_err = $rating_err = $comment_err = $url_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate movie title
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter movie title.";
    } else {
        $title = trim($_POST["title"]);
    }

    // Validate director
    if (empty(trim($_POST["director"]))) {
        $director_err = "Please enter director name.";
    } else {
        $director = trim($_POST["director"]);
    }

    // Validate release year
    if (empty(trim($_POST["release_year"]))) {
        $release_year_err = "Please enter release year.";
    } else {
        $release_year = trim($_POST["release_year"]);
    }

    // Validate rating
    if (empty(trim($_POST["rating"]))) {
        $rating_err = "Please enter movie rating.";
    } else {
        $rating = trim($_POST["rating"]);
    }

    // Validate comment
    if (empty(trim($_POST["comment"]))) {
        $comment_err = "Please enter comment.";
    } else {
        $comment = trim($_POST["comment"]);
    }

    // Validate URL
    if (empty(trim($_POST["url"]))) {
        $url_err = "Please enter the URL of the movie.";
    } else {
        $url = trim($_POST["url"]);
    }

    // Check input errors before inserting into database
    if (empty($title_err) && empty($director_err) && empty($release_year_err) && empty($rating_err) && empty($comment_err) && empty($url_err)) {
        // Prepare an insert statement
        $sql = "CALL InsertMovie(?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_title, $param_director, $param_release_year, $param_rating, $param_comment, $param_url);

            // Set parameters
            $param_title = $title;
            $param_director = $director;
            $param_release_year = $release_year;
            $param_rating = $rating;
            $param_comment = $comment;
            $param_url = $url;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to admin dashboard
                header("Location: admin_dashboard.php");
                exit;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        span.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Movie</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>">
                <span class="error"><?php echo $title_err; ?></span>
            </div>
            <div>
                <label>Director</label>
                <input type="text" name="director" value="<?php echo $director; ?>">
                <span class="error"><?php echo $director_err; ?></span>
            </div>
            <div>
                <label>Release Year</label>
                <input type="text" name="release_year" value="<?php echo $release_year; ?>">
                <span class="error"><?php echo $release_year_err; ?></span>
            </div>
            <div>
                <label>Rating</label>
                <input type="text" name="rating" value="<?php echo $rating; ?>">
                <span class="error"><?php echo $rating_err; ?></span>
            </div>
            <div>
                <label>Comment</label>
                <input type="text" name="comment" value="<?php echo $comment; ?>">
                <span class="error"><?php echo $comment_err; ?></span>
            </div>
            <div>
                <label>URL</label>
                <input type="text" name="url" value="<?php echo $url; ?>">
                <span class="error"><?php echo $url_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
