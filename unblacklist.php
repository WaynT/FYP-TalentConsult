<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit_unblacklist'])) {
    // Sanitize and retrieve the form input
    $applicantData = filter_input(INPUT_POST, 'unblacklist_data', FILTER_SANITIZE_STRING);

    // Use explode() to split the string by the comma
    $parts = explode(",", $applicantData);

    // Ensure both IC and email are provided
    if (count($parts) !== 3) {
        die("Invalid input format. Expected 'IC, email, project'.");
    }

    // Assign the separated parts to variables
    $unblacklist_IC = trim($parts[0]);  // IC number
    $applicant_email = trim($parts[1]);  // Email
    $project = trim($parts[2]); 
    $newunblacklist_IC = $unblacklist_IC . "*"; // Modified IC for unblacklisting

    // Define the query - Correct the SET clause syntax
    $updateUnblacklist = "UPDATE Applicants SET IC = ?, status = 'attend' WHERE project = ? AND email = ? AND IC = ?";

    // Prepare and execute the query
    try {
        $stmt = $conn->prepare($updateUnblacklist);

        // Check if the preparation was successful
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters to the statement
        $stmt->bind_param("ssss", $newunblacklist_IC, $project, $applicant_email, $unblacklist_IC);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to Blacklists.php after success
            header("Location: Blacklists.php");
            exit();
        } else {
            throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
        }

        // Close the prepared statement
        $stmt->close();

    } catch (Exception $e) {
        // Log the error or handle it gracefully
        echo "An error occurred: " . $e->getMessage();
    }

    // Close the database connection
    $conn->close();
}
?>
