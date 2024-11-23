<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure the database connection is established
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the input data
    $date = htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $IC = htmlspecialchars($_POST['IC'], ENT_QUOTES, 'UTF-8');
    $contactNum = htmlspecialchars($_POST['contactNum'], ENT_QUOTES, 'UTF-8');
    $applicant_email = htmlspecialchars($_POST['applicant_email'], ENT_QUOTES, 'UTF-8');
    $projectname = $_SESSION["project_name"];
    $PIC = $_SESSION["recruiter_email"];
    $remark = htmlspecialchars($_POST['remark'], ENT_QUOTES, 'UTF-8');
    $status = "attend";

    // Prepare the SQL query to check if the applicant is blacklisted
    $searchQuery = "SELECT * FROM Applicants WHERE IC = ? AND email = ? AND status = 'blacklist'";
    $stmt = $conn->prepare($searchQuery);

    // Check if the preparation was successful
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the IC and email parameters and execute the statement
    $stmt->bind_param("ss", $IC, $applicant_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Output JavaScript for confirmation dialog
        echo "<script>
            if (confirm('This applicant with the IC (". htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ") was blacklisted before. Kindly remove the applicant from the blacklist page.')) {
                window.location.href = 'Project_Recruiters.php';
            } else {
                window.location.href = 'Project_Recruiters.php';
            }
        </script>";
    } else {
        // Prepare the SQL query to insert the new applicant
        $query = "INSERT INTO Applicants (date, name, IC, contact_num, email, project, PIC, remark, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Check if the preparation was successful
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind the parameters to the SQL query
        $stmt->bind_param("sssssssss", $date, $name, $IC, $contactNum, $applicant_email, $projectname, $PIC, $remark, $status);

        // Execute the statement and check for errors
        if ($stmt->execute()) {
            header("Location: Project_Recruiters.php");
            exit();
        } else {
            echo "Execution failed: " . htmlspecialchars($stmt->error);
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
