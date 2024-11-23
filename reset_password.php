<?php
session_start();

// Include the settings file to fetch database credentials
require_once "settings.php";

// Establish database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errors = [];

// Handle the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new_pass']) && isset($_POST['new_pass_c']) && isset($_POST['token'])) {
        $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
        $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);
        $token = $_POST['token'];

        // Validate passwords
        if (empty($new_pass) || empty($new_pass_c)) {
            array_push($errors, "Password is required");
        }
        if ($new_pass !== $new_pass_c) {
            array_push($errors, "Passwords do not match");
        }

        if (count($errors) == 0) {
            $token_hash = hash("sha256", $token);
            $sql = "SELECT email FROM User WHERE reset_token_hash = ? AND reset_token_expires_at >= NOW() LIMIT 1";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                echo "<script>
                        alert('Database error: " . addslashes($conn->error) . "');
                        window.location.href = 'forgot_password.php';
                      </script>";
                exit;
            }

            $stmt->bind_param("s", $token_hash);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                $email = $user['email'];

                $update_sql = "UPDATE User SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE email = ?";
                $update_stmt = $conn->prepare($update_sql);

                if (!$update_stmt) {
                    echo "<script>
                            alert('Database error: " . addslashes($conn->error) . "');
                            window.location.href = 'forgot_password.php';
                          </script>";
                    exit;
                }

                $update_stmt->bind_param("ss", $new_pass, $email);
                if ($update_stmt->execute()) {
                    echo "<script>
                            alert('Password has been reset successfully.');
                            window.location.href = 'Login.html';
                          </script>";
                    exit;
                } else {
                    echo "<script>
                            alert('Failed to reset password. Please try again.');
                            window.location.href = 'forgot_password.php';
                          </script>";
                }

                $update_stmt->close();
            } else {
                echo "<script>
                        alert('Invalid or expired token.');
                        window.location.href = 'forgot_password.php';
                      </script>";
            }

            $stmt->close();
        } else {
            $error_message = implode("\\n", $errors);
            echo "<script>
                    alert('" . addslashes($error_message) . "');
                    window.location.href = 'reset_password.php?token=". $token . "';
                  </script>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Reset Password</title>
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

        h1 {
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
            background-color: #E21818;
            color: black;
        }

        .u-header .u-menu a.u-active {
            background-color: #E21818;
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

        .u-form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
            border-radius: 20px;
        }

        /* Submit Button */
        button[type="submit"] {
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

        button[type="submit"]:hover {
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

    <!-- Reset Password Form -->
    <section>
        <div class="custom-expanded">
            <form method="post" action="reset_password.php" class="u-form">
                <div class="u-form-group">
                    <h1>Reset Password</h1>
                    <label for="new_pass">New Password:</label>
                    <input type="password" name="new_pass" id="new_pass" required>
                </div>
                <div class="u-form-group">
                    <label for="new_pass_c">Confirm New Password:</label>
                    <input type="password" name="new_pass_c" id="new_pass_c" required>
                </div>
                <!-- Hidden token field -->
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">

                <button type="submit">Reset</button>
            </form>
        </div>
    </section>

</body>
</html>

