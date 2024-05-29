<?php
require_once('db_config.php');
session_start();
// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the form
    $user_id = $_POST['user_id'];
    $movie_id = $_POST['movie_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Insert review into the database
    $query = "INSERT INTO reviews (user_id,movie_id,rating,comment) VALUES ('$user_id','$movie_id','$rating','$comment')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Review added successfully.";
    } else {
        echo "Error adding review: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>
