<?php
session_start();

// Include the settings file to fetch database credentials
require_once "settings.php";

// Establish database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize an array to store errors
$errors = [];

// Handle the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Password Reset Request (send email)
    if (isset($_POST['email'])) {
        // Fetch the email from POST securely and validate it
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (!$email) {
            echo "<script>
                    alert('Invalid email address.');
                    window.location.href = 'forgot_password.php';
                  </script>";
            exit;
        }

        // Generate token and hash
        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);

        // Set expiration time (30 minutes from now)
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

        // Update the reset token and expiry for the provided email
        $sql = "UPDATE User
                SET reset_token_hash = ?,
                    reset_token_expires_at = ?
                WHERE email = ?";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "<script>
                    alert('Database error: " . addslashes($conn->error) . "');
                    window.location.href = 'forgot_password.php';
                  </script>";
            exit;
        }

        // Bind parameters and execute the query
        $stmt->bind_param("sss", $token_hash, $expiry, $email);
        $stmt->execute();

        // Check if any row was updated
        if ($stmt->affected_rows > 0) {
            // Send email to user with the token in a link they can click on
            $to = $email;
            $subject = "Reset your password on admintalentconsult.com";
            $msg = "
                <p>
                    <img src='https://admintalentconsult.com/images/image.png' alt='Logo' width='100' height='100'>
                </p>
                <p>
                    Hi there, click on this <a href=\"https://admintalentconsult.com/reset_password.php?token=" . $token . "\">link</a> to reset your password on our site.
                </p>
                <p>If you didn't request a password reset, please ignore this email.</p>
            ";

            $headers = "From: Talent Consult Admin <admin@admintalentconsult.com>\r\n";
            $headers .= "Content-type: text/html\r\n"; // Set content type to HTML

            if (mail($to, $subject, $msg, $headers)) {
                echo "<script>
                        alert('Kindly check your email to reset password.');
                        window.location.href = 'Login.html';
                      </script>";
                exit;
            } else {
                echo "<script>
                        alert('Failed to send the email. Please try again.');
                        window.location.href = 'forgot_password.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('No account found with that email.');
                    window.location.href = 'forgot_password.php';
                  </script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
