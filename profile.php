<?php
session_start();
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['email'])) {
    die("User not logged in.");
}

$user_email = $_SESSION['email'];

// Fetch current user details
$query = "SELECT username, email, password FROM User WHERE email='$user_email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'], $_POST['password'], $_POST['new_password'])) {
        $new_username = $_POST['username'];
        $password = $_POST['password'];
        $new_password = $_POST['new_password'];

        // Verify the old password
        if ($password == $user['password']) {
            // Update the username
            $update_query = "UPDATE User SET username='$new_username' WHERE email='$user_email'";
            $update_result = mysqli_query($conn, $update_query);

            if (!$update_result) {
                die("Username update failed: " . mysqli_error($conn));
            }

            // Update the password if provided
            if (!empty($new_password)) {
                $update_password_query = "UPDATE User SET password='$new_password' WHERE email='$user_email'";
                $update_password_result = mysqli_query($conn, $update_password_query);

                if (!$update_password_result) {
                    die("Password update failed: " . mysqli_error($conn));
                }
            }
    
            echo "<script>
                        alert('Profile successfully updated!');
                    </script>";
        } else {
            echo "<script>
                        alert('The old password you entered is incorrect.');
                    </script>";
        }
    } else {
        echo "<script>
                alert('The old password you entered is incorrect.');
            </script>";
    }
}
?>


    <!DOCTYPE html>
    <html style="font-size: 16px;" lang="en"><head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="keywords" content="Table List">
        <meta name="description" content="">
        <title>Project Recruiters</title>
        <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Project_Recruiters.css" media="screen">
        <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
        <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
        <script type="application/ld+json">{
    		"@context": "http://schema.org",
    		"@type": "Organization",
    		"name": ""
    }</script>
        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="Project_Recruiters">
        <meta property="og:type" content="website">
      <meta data-intl-tel-input-cdn-path="intlTelInput/">
      <link rel="icon" type="images/png" href="images/image.png">
      
      <style>
          
          /* Base styling for the sign-out button */
.sign-out-button {
    display: inline-block;
    color: #E21818; /* Red font color */
    background-color: transparent; /* Transparent background by default */
    border: 2px solid #E21818; /* Red border */
    border-radius: 12px; /* Rounded corners */
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    margin-left:200%;
}

/* Hover effect for the sign-out button */
.sign-out-button:hover {
    background-color: #E21818; /* Red background */
    color: white; /* White text color */
    border-color: #E21818; /* Maintain red border */
}
          
      </style>
    </head>
      <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
            <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
              <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                  <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
                  <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
    </g></svg>
                </a>
              </div>
              <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                        <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Projects.php" style="padding: 10px 0px;">Projects</a>
                            <div class="u-nav-popup">
                                <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                    <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Blacklists.php">Blacklists</a></li>
                                    <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Lists_PIC.php">Lists</a></li>
                                     <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Applicants.php">Applicants</a></li>
                                        
                                </ul>
                            </div>
                        </li>
                        <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="PICcontrol.php" style="padding: 10px 0px;">Recruiters</a></li>
                        
                        <li class="u-nav-item">
                        <a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="profile.php" style="padding: 10px 0px;"><?php echo htmlspecialchars($_SESSION['email']); ?></a>

                    </li>
                        <li class="u-nav-item"><a class="sign-out-button" href="Login.html">Sign Out</a></li>
                    </ul>
                </div>
              <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                  <div class="u-inner-container-layout u-sidenav-overflow">
                    <div class="u-menu-close"></div>
                    <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Lists_PIC.html">Lists</a><div class="u-nav-popup"><ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12"><li class="u-nav-item"><a class="u-button-style u-nav-link">Blacklist</a>
    </li><li class="u-nav-item"><a class="u-button-style u-nav-link">Attend</a>
    </li></ul>
    </div>
    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="PICcontrol.php">Recruiters</a>
    </li></ul>
                  </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
              </div>
            </nav>
            <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
          </div></header>
   <body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 0;">

    <!-- Profile Section -->
    <section style="max-width: 600px; margin: 50px auto; background-color: #fff; box-shadow: 0px 0px 15px rgba(0,0,0,0.1); padding: 30px; border-radius: 10px;">
        <h1 style="font-size: 28px; color: #333; text-align: center; margin-bottom: 20px; border-bottom: 2px solid #E21818; padding-bottom: 10px;">Your Profile</h1>
        
        <!-- User Information -->
        <p style="font-size: 16px; color: #555;"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p style="font-size: 16px; color: #555;"><strong>Name:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    
        <!-- Update Profile Form -->
        <h2 style="font-size: 24px; color: #E21818; margin-top: 30px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Update Profile</h2>
        
        <form action="" method="POST" style="margin-top: 20px;">
            <!-- Username Field -->
            <div style="margin-bottom: 15px;">
                <label for="username" style="display: block; font-size: 14px; color: #555; margin-bottom: 5px;">New Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <!-- Old Password Field -->
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; font-size: 14px; color: #555; margin-bottom: 5px;">Old Password:</label>
                <input type="password" name="password" id="password" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <!-- New Password Field -->
            <div style="margin-bottom: 20px;">
                <label for="new_password" style="display: block; font-size: 14px; color: #555; margin-bottom: 5px;">New Password:</label>
                <input type="password" name="new_password" id="new_password" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <!-- Submit Button -->
            <button type="submit" style="background-color: #E21818; color: #fff; padding: 12px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Update Profile</button>
        </form>
    </section>
</body>

    </html>
