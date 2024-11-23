<?php
session_start();

// Include necessary files and database connection
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST["date"]) && isset($_POST["name"]) && isset($_POST["IC"]) && isset($_POST["contactNum"]) && isset($_POST["applicant_email"]) && isset($_POST["remark"])) {
        // Get data from the form
        $date = $_POST["date"];
        $name = $_POST["name"];
        $IC = $_POST["IC"];
        $uneditedIC = $_SESSION['edit_applicantIC'] ?? null;
        $contactNum = $_POST["contactNum"];
        $applicant_email = $_POST["applicant_email"];
        $project_name = $_SESSION['project_name'] ?? null;
        $PIC = $_SESSION["recruiter_email"] ?? null;
        $remark = $_POST['remark'];
        $status = "attend";

        if ($uneditedIC && $project_name && $PIC) {
            // Update project details in the database
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "UPDATE Applicants SET date = ?, name = ?, IC = ?, contact_num = ?, email = ?, project = ?, PIC = ?, remark = ?, status = ? WHERE IC=?";
            $stmt = $conn->prepare($query);
            
            if ($stmt) {
                $stmt->bind_param("ssssssssss", $date, $name, $IC, $contactNum, $applicant_email, $project_name, $PIC, $remark, $status, $uneditedIC);

                if ($stmt->execute()) {
                    // Redirect to the project list page after successful update
                    header("Location: Project_Recruiters.php");
                    exit();
                } else {
                    echo "Error executing statement: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }

            // Close database connection
            $conn->close();
        } else {
            echo "Session variables are not set.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
