<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pass_applicant'])) {
        // Sanitize form inputs
        $applicant_email = htmlspecialchars($_POST['pass_applicant'], ENT_QUOTES, 'UTF-8');
        
        // Sanitize session variables
        $project = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');

        // Define the query
        $updatePass = "UPDATE Applicants SET status = 'pass' WHERE email = ? AND project = ?";
        
        // Prepare and execute the query
        try {
            $stmt = $conn->prepare($updatePass);

            // Check if the preparation was successful
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind parameters to the statement
            $stmt->bind_param("ss", $applicant_email, $project);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to another page after processing
                echo "<script>
                    alert('The applicant has been added to pass list!');
                    window.location.href = 'Project_Recruiters.php';
                </script>";
                exit();
            } else {
                throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
            }
        } catch (Exception $e) {
            // Log the error or handle it gracefully
            echo "An error occurred: " . $e->getMessage();
        }
        }


        if (isset($_POST['fail_applicant'])) {
        // Sanitize form inputs
        $applicant_email = htmlspecialchars($_POST['fail_applicant'], ENT_QUOTES, 'UTF-8');

        // Sanitize session variables
        $project = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');

        // Define the query
        $updateFail = "UPDATE Applicants SET status = 'fail' WHERE email = ? AND project = ?";
        
        // Prepare and execute the query
        try {
            $stmt = $conn->prepare($updateFail);

            // Check if the preparation was successful
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind parameters to the statement
            $stmt->bind_param("ss", $applicant_email, $project);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to another page after processing
                echo "<script>
                    alert('The applicant has been added to fail list!');
                    window.location.href = 'Project_Recruiters.php';
                </script>";
                exit();
            } else {
                throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
            }
        } catch (Exception $e) {
            // Log the error or handle it gracefully
            echo "An error occurred: " . $e->getMessage();
        }
        }
}
?>