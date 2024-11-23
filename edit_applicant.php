<?php
session_start(); // Start the session at the very beginning

// Include necessary files and database connection
require_once "settings.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Applicant</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Add_PIC.css" media="screen">
    <link rel="icon" type="images/png" href="images/image.png">
</head>
<body>

<?php
// Check if edit_applicant parameter is set in the URL
if (isset($_GET['edit_applicant'])) {
    $applicantIC = $_GET['edit_applicant'];
    $project_name = $_SESSION['project_name'];

    // Establish database connection
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to fetch applicant details
    $query = "SELECT * FROM Applicants WHERE project = ? AND IC = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $project_name, $applicantIC);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if applicant exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['edit_applicantIC'] = $row['IC']; // Store IC in session variable
        ?>

    <section class="u-clearfix u-section-1" id="sec-4345">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="custom-expanded u-form u-grey-15 u-radius u-form-1">
                <h2>Edit Applicant</h2>
                <form action="update_applicant.php" method="post">
                    <div class="u-form-group u-form-name u-label-top">
                    <label for="date-c33c" class="u-label u-label-1">Date:</label>
                        <input type="date" id="date" name="date" class="u-input u-input-rectangle u-radius u-input-1" value="<?php echo htmlspecialchars($row['date']); ?>">
                    </div>

                    <div class="u-form-group u-label-top">
                        <label for="name-c33c" class="u-label u-label-2">Name:</label>
                        <input type="text" placeholder="Enter applicant's name" id="name" name="name" class="u-input u-input-rectangle u-radius u-input-2" value="<?php echo htmlspecialchars($row['name']); ?>">
                    </div>

                    <div class="u-form-group u-label-top">
                        <label for="IC-c33c" class="u-label u-label-2">IC Number:</label>
                        <input type="text" placeholder="Enter applicant's IC number" id="IC" name="IC" class="u-input u-input-rectangle u-radius u-input-3" value="<?php echo htmlspecialchars($row['IC']); ?>">
                    </div>

                    <div class="u-form-group u-label-top u-form-group-2">
                        <label for="text-9beb" class="u-label u-label-4">Contact Number:</label>
                        <input type="text" placeholder="Enter applicant's contact number" id="contactNum" name="contactNum" class="u-input u-input-rectangle u-radius u-input-4" value="<?php echo htmlspecialchars($row['contact_num']); ?>">
                    </div>

                    <div class="u-form-group u-label-top u-form-group-2">
                    <label for="text-9beb" class="u-label u-label-4">Email:</label>
                        <input type="email" placeholder="Enter applicant's email address" id="applicant_email" name="applicant_email" class="u-input u-input-rectangle u-radius u-input-4" value="<?php echo htmlspecialchars($row['email']); ?>">
                    </div>

                    <div class="u-form-group u-form-message u-label-top u-form-group-6">
                        <label for="text-37ba" class="u-label u-label-5">Remark:</label>
                        <textarea placeholder="Any remark..." id="remark" name="remark" class="u-input u-input-rectangle u-radius u-input-5"><?php echo htmlspecialchars($row['remark']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Edit" class="u-btn u-btn-submit">
                    </div>
                </form>
            </div>
        </div>

        <?php
    } else {
        echo "Applicant not found.";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Applicant parameter is missing.";
}
?>
</body>
</html>
