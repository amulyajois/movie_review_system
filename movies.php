<?php
require_once('db_config.php');
session_start();
// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            background-image: url("C:/xampp/htdocs/movie_review_system/registerimage.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: rgba(211, 211, 211, 0.5); /* Adding a semi-transparent white background to improve readability */
            padding: 20px;
            border-radius: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 2px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        // Check if form is submitted for search
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve search parameters
            $search_id = $_POST['movie_id'];
            $search_title = $_POST['movie_title'];
            $search_rating = $_POST['rating'];

            // Construct the query based on the search parameters
            $query = "SELECT * FROM movies WHERE 1=1"; // Start with a base query

            if (!empty($search_id)) {
                $query .= " AND id = '$search_id'";
            }

            if (!empty($search_title)) {
                $query .= " AND title LIKE '%$search_title%'";
            }

            if (!empty($search_rating)) {
                $query .= " AND rating ='$search_rating'";
            }

            // Execute the query
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<h2>Search Results</h2>";
                echo "<table>";
                echo "<tr><th>Title</th><th>ID</th><th>Director</th><th>Release Year</th><th>Rating</th><th>URL</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['director']}</td>";
                    echo "<td>{$row['release_year']}</td>";
		    echo "<td>{$row['rating']}</td>";
		    echo "<td><a href='{$row['url']}' target='_blank'>{$row['url']}</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No matching movies found.";
            }
        }
        ?>
    </div>
</body>
</html>
