<?php
session_start();

// Include necessary files and database connection
require_once "settings.php";

// Check if projectname parameter is set in the URL
if (isset($_GET['projectname'])) {
    $projectname = $_GET['projectname'];

    // Establish database connection
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to fetch project details
    $query = "SELECT * FROM PIC WHERE projectname = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $projectname);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if project exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Project</title>
            <link rel="stylesheet" href="edit_project.css">
             <link rel="icon" type="images/png" href="images/image.png">
        </head>
        <body>
        <div class="black-box">
            <div class="form-container">
                <h2>Edit Project</h2>
                <form action="update_project.php" method="POST">
                    <input type="hidden" name="projectname" value="<?php echo htmlspecialchars($row['projectname']); ?>">

                    <!-- Client Field -->
                    <div class="form-group">
                        <label for="client">Client:</label>
                        <input type="text" id="client" name="client" value="<?php echo htmlspecialchars($row['client']); ?>">
                    </div>

                    <!-- Applicants Field -->
                    <div class="form-group">
                        <label for="applicants">Applicants:</label>
                        <input type="text" id="applicants" name="applicants" value="<?php echo htmlspecialchars($row['applicants']); ?>">
                    </div>

                    <!-- Priority Field -->
                    <div class="form-group">
                        <label for="priority">Priority:</label>
                        <input type="number" id="priority" name="priority" value="<?php echo htmlspecialchars($row['priority']); ?>">
                    </div>

                    <!-- Remarks Field -->
                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea id="remarks" name="remarks"><?php echo htmlspecialchars($row['remarks']); ?></textarea>
                    </div>

                    <!-- Submit Button -->
                    <input type="submit" value="Edit">
                </form>
            </div>
        </div>
        </body>
        </html>

        <?php
    } else {
        echo "Project not found.";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Project name parameter is missing.";
}
?>
