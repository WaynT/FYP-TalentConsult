<?php
session_start();

require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $Password = $_POST["password"];

    // Prepare SQL statement to prevent SQL injection
    $query = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['verification'] != NULL)
        {
            echo "<script>
                        alert('Kindly get the verification code from the master PIC\'s email.');
                        window.location.href = 'account_verification.php?email=" . $Email . "';
                      </script>";
                exit();
        }
        // Verify password using password_verify()
        if ($Password == $row['password']) {
            if ($row['verification'] == NULL) {
                // Check if user is PIC
                if ($row['PIC'] === 'true') {
                    $_SESSION['email'] = $Email;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['PIC'] = true;
                    header("Location: Lists_PIC.php");
                    exit();
                } elseif ($row['PIC'] === 'false') {
                    $_SESSION['email'] = $Email;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['PIC'] = false;
                    header("Location: Projects.php");
                    exit();
                }
            }
        } else {
            $_SESSION['login_error'] = "Invalid password. Please try again.";
            header("Location: Login.html?loginFailed=true");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Invalid email. Please try again.";
        header("Location: Login.html?loginFailed=true");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($conn);
}
?>
