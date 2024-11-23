<?php
session_start();
require_once "settings.php";

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// Get the raw POST data from the request
$postData = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($postData, true);

// Check for JSON decoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
    exit;
}

// Access the values
$input1 = $data['input1'] ?? 'default1';
$input2 = $data['input2'] ?? 'default2';
$input3 = $data['input3'] ?? 'default2';

// Initialize the response array
$response = ['status' => 'success'];

// Update the database based on the value of input2
if ($input2 === "false") {
    // SQL query to update the PIC status
    $removePIC = "UPDATE User SET PIC = 'false' WHERE email = ?";
    
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare($removePIC);

        // Check if the preparation was successful
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters to the statement
        $stmt->bind_param("s", $input1);

        // Execute the statement
        if ($stmt->execute()) {
            // Update the response message
            $response['message'] = $input3 . ' has been removed as PIC';
        } else {
            throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
        }
        
        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Update the response to indicate an error
        $response['status'] = 'error';
        $response['message'] = 'An error occurred: ' . $e->getMessage();
    }
} else if ($input2 === "true") {
    // SQL query to update the PIC status
    $addPIC = "UPDATE User SET PIC = 'true' WHERE email = ?";
    
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare($addPIC);

        // Check if the preparation was successful
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters to the statement
        $stmt->bind_param("s", $input1);

        // Execute the statement
        if ($stmt->execute()) {
            // Update the response message
            $response['message'] = $input3 . ' has been set as PIC';
        } else {
            throw new Exception('Execution failed: ' . htmlspecialchars($stmt->error));
        }
        
        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Update the response to indicate an error
        $response['status'] = 'error';
        $response['message'] = 'An error occurred: ' . $e->getMessage();
    }
}

// Close the database connection
$conn->close();

// Set the content type to application/json
header('Content-Type: application/json');

// Send the response back to the client
echo json_encode($response);
?>
