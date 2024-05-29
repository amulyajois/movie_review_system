<?php
session_start();
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            header('Location: movies1.php'); 
            // Redirect to movies.html
            exit();
        } else {
            echo "Invalid password. <a href='login.html'>Try again</a>";
        }
    } else {
        echo "User not found. <a href='register.html'>Register</a>";
    }
} else {
    header('Location: index.html');
}
// After successful authentication
$_SESSION['username'] = $username; // $username is the username of the logged-in user

 
?>