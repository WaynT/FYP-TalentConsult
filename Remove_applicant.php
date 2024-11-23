<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['removeApplicant'])) {
        $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
        $applicantData = htmlspecialchars($_POST['removeApplicant'], ENT_QUOTES, 'UTF-8');

        // Use explode() to split the string by the comma
        $parts = explode(",", $applicantData);

        // Assign the separated parts to variables
        $applicant_ic = trim($parts[0]);  // Trim to remove any leading or trailing spaces
        $applicant_email = trim($parts[1]);

        // Prepare the query with placeholders
        $removeQuery = "DELETE FROM Applicants WHERE IC = ? AND project = ? AND email = ?";
        $stmt = $conn->prepare($removeQuery);
        $stmt->bind_param("sss", $applicant_ic, $project_name, $applicant_email);
        $stmt->execute();

        // Redirect to another page after processing
        echo "<script>
                alert('The applicant has been removed!');
                window.location.href = 'Project_Recruiters.php';
               </script>";
        exit();
    }
}
?>
