<?php
require_once('db_config.php');
session_start();
// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header('Location: login.php');
    exit;
}
?><!DOCTYPE html>
<html>
<head>
    <title>Movie Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 20px; /* Add padding to create space for buttons */
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        .nav-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .nav-buttons button {
            margin-left: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: black;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Fetch all movies initially
$query = "SELECT * FROM reviews";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h2><center>MOVIE REVIEWS</h2>";

    // Add navigation buttons
    echo '<div class="nav-buttons">';
    echo '<button onclick="window.location.href=\'movies1.php\'">Back to Movies</button>';
    echo '<button onclick="window.location.href=\'logout.php\'">Logout</button>';
    echo '</div>';

    echo "<table>";
    echo "<tr><th>User ID</th><th>Movie ID</th><th>Rating</th><th>Comment</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['movie_id'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "<td>" . $row['comment'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No movies found.</p>";
}
?>

</body>
</html>
