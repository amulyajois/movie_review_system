<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the movie ID is provided
    if (isset($_POST['movie_id'])) {
        // Database connection
        require_once('db_config.php');

        // Prepare the SQL statement to delete the movie
        $sql = "DELETE FROM movies WHERE id = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind the movie ID parameter
            mysqli_stmt_bind_param($stmt, "i", $movie_id);

            // Set the movie ID parameter
            $movie_id = $_POST['movie_id'];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Movie deletion successful
                echo "Movie with ID: $movie_id deleted successfully.";
            } else {
                // Movie deletion failed
                echo "Error deleting movie: " . mysqli_error($conn);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            // Error with prepared statement
            echo "Error: Unable to prepare SQL statement.";
        }

        // Close connection
        mysqli_close($conn);
    } else {
        // Movie ID not provided
        echo "Error: Movie ID not provided.";
    }
} else {
    // Redirect or display an error message if the form is not submitted
    echo "Error: Form not submitted.";
}
?>
