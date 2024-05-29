<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Admin is logged in, display dashboard
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .dashboard-box {
            width: 50%;
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
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        li {
            margin-bottom: 10px;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: gray;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #45a049;
        }
        a.logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="dashboard-box">
        <h2>Welcome, Admin!</h2>
        <ul>
            <li><a href="view_users.php" class="button">View Registered Users</a></li>
            <li><a href="add_movie.php" class="button">Add New Movie</a></li>
            <li><a href="delete_movie.html" class="button">Delete Movie</a></li>
            
            <!-- Add more admin functionalities as needed -->
        </ul>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
