<?php
session_start();

require_once "settings.php";

// Create connection
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = mysqli_real_escape_string($conn, $_POST["username"]);
    $Password = $_POST["password"];
    $Confirm = $_POST["confirm"];
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $Phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]);
    $PIC = "false"; // Default value for PIC
    $verification = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT); // Generate a 6-digit verification code

    // Check if passwords match
    if ($Password !== $Confirm) {
        echo "<script>
                    alert('Passwords do not match. Please try again.');
                    window.location.href = 'Register.html';
                </script>";
        exit();
    } 

    // Check if the email already exists
    $sql = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>
                    alert('This email is already registered.');
                    window.location.href = 'Register.html';
                </script>";
        exit();
    } else {
        // Prepare an SQL statement for execution
        $stmt = $conn->prepare("INSERT INTO User (username, password, email, PIC, phonenumber, verification) VALUES (?, ?, ?, ?, ?, ?)");
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $Username, $Password, $Email, $PIC, $Phonenumber, $verification);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Send email to master PIC with the verification code
            $to = "johndoeqq22@gmail.com";
            $subject = "Set verification for account with the email: " . $Email;
            $msg = "
                <p>
                    <img src='https://admintalentconsult.com/images/image.png' alt='Logo' width='100' height='100'>
                </p>
                <p>
                    Hi there, there is a new recruiter with the email '". $Email . "' registering into the system.
                </p>
                <p>
                    Verification code is <b>" . $verification . "</b>
                </p>
                <p>If there is no such recruiter registering, kindly ignore this email.</p>
            ";

            $headers = "From: Talent Consult Admin <admin@admintalentconsult.com>\r\n";
            $headers .= "Content-type: text/html\r\n"; // Set content type to HTML

            if (mail($to, $subject, $msg, $headers)) {
                echo "<script>
                        alert('Kindly get the verification code from the master PIC\'s email.');
                        window.location.href = 'account_verification.php?email=" . $Email . "';
                    </script>";
                exit();
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the database connection
mysqli_close($conn);
?>
