<?php
session_start();

// Include necessary files and database connection
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["projectname"]) && isset($_POST["client"]) && isset($_POST["applicants"]) && isset($_POST["priority"]) && isset($_POST["remarks"])) {
        // Get data from the form
        $projectname = $_POST["projectname"];
        $client = $_POST["client"];
        $applicants = $_POST["applicants"];
        $priority = $_POST["priority"];
        $remarks = $_POST["remarks"];

        // Update project details in the database
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "UPDATE PIC SET client=?, applicants=?, priority=?, remarks=? WHERE projectname=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssiss", $client, $applicants, $priority, $remarks, $projectname);

        if ($stmt->execute()) {
            // Redirect to the project list page after successful update
            header("Location: Lists_PIC.php");
            exit();
        } else {
            echo "Error updating project: " . $conn->error;
        }

        // Close database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
