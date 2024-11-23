<?php
session_start();

// Include the database connection settings
require_once "settings.php";

// Check if the search query is provided
if (isset($_GET['search'])) {
    // Get the search query from the GET parameters
    $search = $_GET['search'];

    // Establish a database connection
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to search for the project name or client
    $query = "SELECT * FROM PIC WHERE projectname LIKE '%$search%' OR client LIKE '%$search%' ORDER BY priority DESC";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Output the search results dynamically without reloading the page
        while ($row = mysqli_fetch_assoc($result)) {
            // Output the search results as desired (e.g., echo HTML markup)
            echo "<div class='project-box'>";
            echo "<h3>Project Name: " . $row['projectname'] . "</h3>";
            echo "<p>Client: " . $row['client'] . "</p>";
            echo "<p>Applicants: " . $row['applicants'] . "</p>";
            echo "<p class='priority-" . $row['priority'] . "'>Priority: " . $row['priority'] . "</p>";
            echo "<p>Remarks: " . $row['remarks'] . "</p>";
            echo "</div>";
        }
    } else {
        // If the query fails, display an error message
        echo "Query failed: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If no search query is provided, redirect back to the index.php page
    header("Location: index.php");
    exit();
}
?>
