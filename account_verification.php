<?php
session_start();

// Include the settings file to fetch database credentials
require_once "settings.php";

// Establish database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the email from the URL query string
if (isset($_GET['email'])) {
    $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
    
    if (!$email) {
        echo "<script>
                alert('Invalid email format.');
                window.location.href = 'Login.html';
              </script>";
        exit();
    }

    $_SESSION['verification_email'] = $email; // Store the email in session
} elseif (!isset($_SESSION['verification_email'])) {
    // If there's no email in the session or query string, redirect to the login page
    echo "<script>
            alert('Email not provided.');
            window.location.href = 'Login.html';
          </script>";
    exit();
}

// Handle the POST request when the verification code is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['verification_email']; // Get email from session
    $verificationCode = mysqli_real_escape_string($conn, $_POST['verificationCode']);
    
    // Validate that the verification code is numeric and exactly 6 digits
    if (!is_numeric($verificationCode) || strlen($verificationCode) !== 6) {
        echo "<script>
                alert('Invalid verification code format. Please enter a 6-digit numeric code.');
                window.location.href = 'account_verification.php?email=" . $email . "';
              </script>";
        exit();
    }

    // Prepare SQL to select the user based on the email
    $selectSQL = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($selectSQL);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $selectResult = $stmt->get_result();

    if ($selectResult->num_rows > 0) {
        $row = $selectResult->fetch_assoc();
        if ($verificationCode === $row['verification']) {
            // Prepare SQL to update the verification field to NULL
            $updateSQL = "UPDATE User SET verification = NULL WHERE email = ?";
            $update_stmt = $conn->prepare($updateSQL);
            $update_stmt->bind_param("s", $email);

            if ($update_stmt->execute()) {
                echo "<script>
                        alert('Your account has been verified successfully.');
                        window.location.href = 'Login.html';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Error updating the database.');
                        window.location.href = 'account_verification.php?email=" . $email . "';
                      </script>";
                exit();
            }
            $update_stmt->close();
        } else {
            echo "<script>
                    alert('Incorrect verification code.');
                    window.location.href = 'account_verification.php?email=" . $email . "';
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Email not found.');
                window.location.href = 'account_verification.php';
              </script>";
        exit();
    }
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Account Verification</title>
    <link rel="icon" type="images/png" href="images/image.png">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Navigation Bar */
        .u-header {
            width: 100%;
            background-color: white;
            border-bottom: 2px solid black;
            position: absolute;
            top: 0;
            z-index: 100;
        }

        .u-header .u-sheet {
            max-width: 1140px;
            margin: 0 auto;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .u-header .u-menu {
            display: flex;
            align-items: center;
        }

        .u-header .u-menu a {
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid transparent;
            border-bottom: none;
            font-size: 1rem;
        }

        .u-header .u-menu a:hover {
            background-color: #E21818;;
            color: black;
        }

        .u-header .u-menu a.u-active {
            background-color: #E21818;;
            color: white;
        }

        .u-header img {
            height: 100px;
        }

        /* Black Box */
        .custom-expanded {
            background-color: #000;
            padding: 2px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            display: inline-block;
        }

        /* Form Container */
        .u-form {
            width: 400px;
            background-color: #f0f0f0;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin: 0 auto;
        }

        /* Form Group */
        .u-form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .u-form-group label {
            margin-bottom: 5px;
            color: #333;
        }

        .u-form-group input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
            border-radius: 20px;
        }

        /* Submit Button */
        input[type="submit"] {
            width: 50%;
            background-color: #FF0000;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 0;
            margin-top: 20px;
            border-radius: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="submit"]:hover {
            background-color: #357ab8;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <header class="u-header u-clearfix">
        <div class="u-sheet u-sheet-1">
            <img class="u-image u-image-contain u-preserve-proportions u-image-1" src="images/image.png" alt="Site Logo">
            <nav class="u-menu u-menu-dropdown u-offcanvas">
                <a href="Login.html" class="u-button-style">Login</a>
                <a href="Register.html" class="u-button-style">Register</a>
            </nav>
        </div>
    </header>

    <!-- Forgot Password Form -->
    <section>
        <div class="custom-expanded">
            <form action="account_verification.php" method="post" class="u-form">
                <div class="u-form-group">
                    <h2>Account verification</h2>
                    <label for="verificationCode">Verification Code:</label>
                    <input type="text" id="verificationCode" name="verificationCode" placeholder="Enter your verification code" required>
                </div>
                <input type="submit" value="Send">
            </form>
        </div>
    </section>
</body>
</html>
