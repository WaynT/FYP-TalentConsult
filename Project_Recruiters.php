<?php
include "settings.php";
session_start();

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

?>

<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
    }
</script>

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
    
    <style>
    #thead {
      display: none;
    }
            
            /* General table styling */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-bottom: 20px;
    font-family: 'Roboto', sans-serif;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
}

.styled-table th, .styled-table td {
    border: 1px solid #ddd;
    padding: 12px;
}

.styled-table th {
    background-color: #E21818;
    color: white;
    font-weight: 600;
    text-align: center;
}

.styled-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.styled-table tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s ease;
}

 /* Styling for the search form container */
.search-form-container {
    text-align: left;
    margin-left: 5px;
    margin-top: 50px; /* Adds gap from the bottom of the navigation */
}

/* Styling for the search input field */
.search-bar {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    width: 500px; /* Adjust width as needed */
    box-sizing: border-box;
    margin-right: 10px; /* Adds space between input and button */
}

/* Base styling for the search button */
.search-button {
    background-color: #E21818; /* Red background */
    color: white; /* White text color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hover effect for the search button */
.search-button:hover {
    background-color: #c81010; /* Darker red background */
    color: #fff; /* White text color */
}

/* Responsive search bar adjustments */
@media (max-width: 768px) {
    .search-bar {
        width: 100%; /* Adjusts width to 100% on smaller screens */
        margin-bottom: 10px; /* Adds space between input and button */
    }

    .search-button {
        width: 100%; /* Button takes full width on smaller screens */
    }
}
            
.btn-small {
    font-size: 1.0rem; /* Smaller font size */
    padding: 0.25rem 0.5rem; /* Smaller padding */
    line-height: 1.2; /* Adjust line height */
    border-radius: 2.5rem; /* Maintain rounded corners */
}
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
</head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
  <header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g></svg>
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
                         <li class="u-nav-item"><a class="sign-out-button" href="Login.html">Sign Out</a></li>

                    </li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Projects.php">Projects</a>
                                <div class="u-nav-popup">
                                    <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Blacklists.html">Blacklist</a></li>
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Lists.html">Lists</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="PICcontrol.php">Recruiters</a></li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Login.html">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
    </div>
</header>
      <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Retrieve and sanitize the project name from the form submission
                if (isset($_POST['project_name'])) {
                  $_SESSION['project_name'] = htmlspecialchars($_POST['project_name'], ENT_QUOTES, 'UTF-8');
                  $project_name = $_SESSION['project_name'];

                    // Prepare the SQL statement with a placeholder
                    $query = "SELECT * FROM PIC WHERE projectname = ?";
                    $stmt = $conn->prepare($query);
                    
                    // Check if the preparation was successful
                    if ($stmt === false) {
                        die('Prepare failed: ' . htmlspecialchars($conn->error));
                    }
                    
                    // Bind the email parameter to the placeholder
                    $stmt->bind_param("s", $project_name);
                    
                    // Execute the statement
                    $stmt->execute();
                    
                    // Get the result
                    $result = $stmt->get_result(); 

                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION['recruiter_email'] = $row['recruiters'];
                        }
                    }
                    $stmt->close();
                  }
                }
              ?>

    <section class="u-clearfix u-section-1" id="sec-e013">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-border-3 u-border-grey-dark-1 u-container-style u-group u-radius u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h5 class="u-text u-text-default u-text-1">Project: <?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?></h5>
            
            <?php
                if ($_SESSION['recruiter_email'])
                {
                    echo "<h5 class='u-text u-text-default u-text-2'>Recruiters: " .$_SESSION['recruiter_email']."</h5>";
                }
                else
                {
                    echo "<h5 class='u-text u-text-default u-text-2'>Recruiters: No recruiter is assigned to this project.</h5>";
                }
            ?>
            
            <form method='POST' action='Project_Recruiters.php'>
                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit'  name='pass' class="u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-1">Pass</button>

                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit' name='attend' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-2'>Attend</button>

                <input type='hidden' name='project_name' value="<?php echo htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type='submit' name='fail' class="u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-3">Fail</button>
            </form>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
            <div class="u-container-layout u-valign-bottom u-container-layout-2">
                    <div class="search-form-container">
                <form action="Project_Recruiters.php" method="GET" class="search-form-container" style="margin: 0;">
                    <input type="text" name="search" class="search-bar" placeholder="Search by Applicant's Name or IC">
                    <button type="submit" name="searchBtn" class="search-button">Search</button>
                </form>
                    </div>
            </div>
            <?php
                $email = $_SESSION['email'];
                $recruiter_email = $_SESSION['recruiter_email'];
                $recruiterArray = explode(", ", $recruiter_email);
                $rightProject = false; // Assume the project is free
        
                foreach ($recruiterArray as $recruiterEmail) {
                    if ($recruiterEmail == $email) {
                        $rightProject = true; // If the current user's email is found, set to false
                        break; // Exit the loop early since we found the email
                    }
                }

                if ($rightProject == true || $_SESSION['PIC'] == true )
                {
                    echo "<form method='POST' action='Add_Applicants.html'>
                <input type='hidden' name='project_name' value=" . htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8').">
                <button type='submit' id='add' name='add' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-4'>Add</button>
                </form>
                </div>";
                }
                else
                {
                    echo "<form method='POST' action='Add_Applicants.html'>
                <input type='hidden' name='project_name' value=" . htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8').">
                <button type='submit' disabled id='add' name='add' class='u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-4'>Add</button>
                </form>
                </div>";
                }
            ?>
    


            <div class="">
                    <div class="">
                            </div>
              <div class="u-container-layout u-container-layout-3">
              <?php
              // Check if the search query is provided
if (isset($_GET['searchBtn'])) {
    // Get the search query from the GET parameters
    $search = '%' . $_GET['search'] . '%';

    // Prepare the SQL query to search for the project name or client
    $searchQuery = "SELECT * FROM Applicants WHERE date LIKE ? OR name LIKE ? OR IC LIKE ? OR contact_num LIKE ? OR email LIKE ?";

    // Prepare and execute the query
    try {
        $stmt = $conn->prepare($searchQuery);

        // Check if the preparation was successful
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters to the placeholders
        $stmt->bind_param("sssss", $search, $search, $search, $search, $search);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $searchResult = $stmt->get_result();
        $project_name = $_SESSION['project_name'];

        // Check if there are any results
        if ($searchResult->num_rows > 0) {
            // Open the table and add headers
            echo "";
            echo "<table class='styled-table' width='100%'>\n";
            echo "<thead>\n<tr>\n"
                . "<th scope='col'>Date</th>\n"
                . "<th scope='col'>Name</th>\n"
                . "<th scope='col'>IC</th>\n"
                . "<th scope='col'>Contact Number</th>\n"
                . "<th scope='col'>Email</th>\n"
                . "<th scope='col'>Project Name</th>\n"
                . "<th scope='col'>PIC</th>\n"
                . "<th scope='col'>Remark</th>\n"
                . "<th scope='col'>Status</th>\n";

            $email = $_SESSION['email'];
            $recruiter_email = $_SESSION['recruiter_email'];
            $recruiterArray = explode(", ", $recruiter_email);
            $rightProject = false; // Assume the project is free

            foreach ($recruiterArray as $recruiterEmail) {
                if ($recruiterEmail == $email) {
                    $rightProject = true; // If the current user's email is found, set to true
                    break; // Exit the loop early since we found the email
                }
            }

            if ($rightProject == true || $_SESSION['PIC'] == true) {
                echo "<th scope='col'>Actions</th>\n";
            }

            echo "</tr>\n</thead>\n<tbody>\n";

            // Loop through each row of results and add a table row
            while ($row = mysqli_fetch_assoc($searchResult)) {
                if ($row['project'] == $project_name) {
                    echo "<tr>\n";
                    echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";

                    // Common button style for fixed size
                    $buttonStyle = "width: 100px; height: 40px; display: inline-block; line-height: 40px; text-align: center;";
                    $current_status = $row['status'];

                    if ($current_status == "attend") {
                        if ($rightProject == true || $_SESSION['PIC'] == true) {
                            echo "<td>";

                            // Buttons
                            echo "<form id='passApplicantForm_" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='PassFailApplicant.php'>
                                <input type='hidden' name='pass_applicant' value='" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                                <button type='button' name='submit_pass'
                                    class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                                    style='" . $buttonStyle . "' 
                                    onclick='confirmPass(\"" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "\")'>
                                Pass
                                </button>
                            </form>";

                            echo "<script>
                            function confirmPass(email) {
                                if (confirm('Are you sure you want to pass this applicant?')) {
                                    document.getElementById('passApplicantForm_' + email).submit(); // Submit the form for the specific email
                                }
                            }
                            </script>";

                                echo "<form id='failApplicantForm_" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='PassFailApplicant.php'>
                                <input type='hidden' name='fail_applicant' value='" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                                <button type='button' name='submit_fail'
                                    class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                                    style='" . $buttonStyle . "' 
                                    onclick='confirmFail(\"" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "\")'>
                                Fail
                                </button>
                            </form>";

                            echo "<script>
                            function confirmFail(email) {
                                if (confirm('Are you sure you want to fail this applicant?')) {
                                    document.getElementById('failApplicantForm_' + email).submit(); // Submit the form for the specific email
                                }
                            }
                            </script>";

                            echo "<form id='blackListForm_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='Blacklists.php'>
                                    <input type='hidden' name='blacklistApplicant' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ", " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                                    <button type='button' id='blacklistApplicantButton_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' 
                                        class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                                        style='" . $buttonStyle . "' 
                                        onclick='confirmBlacklist(\"" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "\")'>
                                    Blacklist
                                    </button>
                                  </form>";

                            echo "<script>
                                    function confirmBlacklist(ic) {
                                        if (confirm('Are you sure you want to blacklist this applicant?')) {
                                            document.getElementById('blackListForm_' + ic).submit(); // Submit the form for the specific IC
                                        }
                                    }
                                  </script>";

                            echo "<form id='removeApplicantForm_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='Remove_applicant.php'>
                                    <input type='hidden' name='removeApplicant' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ", " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                                    <button type='button' id='removeApplicantButton_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' 
                                        class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                                        style='" . $buttonStyle . "' 
                                        onclick='confirmRemoval(\"" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "\")'>
                                    Remove
                                    </button>
                                  </form>";

                            // Edit Button
                            echo "<form method='GET' action='edit_applicant.php' style='display:inline;'>
                                    <input type='hidden' name='edit_applicant' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "'>
                                    <button type='submit' class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' style='" . $buttonStyle . "'>Edit</button>
                                  </form>";

                            echo "<script>
                                    function confirmRemoval(ic) {
                                        if (confirm('Are you sure you want to remove this applicant?')) {
                                            document.getElementById('removeApplicantForm_' + ic).submit(); // Submit the form for the specific IC
                                        }
                                    }
                                  </script>";

                            echo "</td>\n";
                        }
                    }

                    // Close the table row
                    echo "</tr>\n";
                }
            }

            // Close the table body and table
            echo "</tbody>\n</table>\n";
            echo "</div></div>";
        } else {
            echo "No records found.";
        }
    } catch (Exception $e) {
        echo 'Query failed: ' . $e->getMessage();
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['attend'])) {
        $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
        $_SESSION['status'] = "attend";

        // Define the query
        $attendQuery = "SELECT * FROM Applicants WHERE project = ? AND status = 'attend'";

        // Prepare and execute the query
        try {
            $stmt = $conn->prepare($attendQuery);

            // Check if the preparation was successful
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind the project_name parameter to the placeholder
            $stmt->bind_param("s", $project_name);

            // Execute the statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            // Check if there are any results
            if ($result->num_rows > 0) {
                // Open the table and add headers
                echo "";
                echo "<table class='styled-table' width='100%'>\n";
                echo "<thead>\n<tr>\n"
                    . "<th scope='col'>Date</th>\n"
                    . "<th scope='col'>Name</th>\n"
                    . "<th scope='col'>IC</th>\n"
                    . "<th scope='col'>Contact Number</th>\n"
                    . "<th scope='col'>Email</th>\n"
                    . "<th scope='col'>Project Name</th>\n"
                    . "<th scope='col'>PIC</th>\n"
                    . "<th scope='col'>Remark</th>\n"
                    . "<th scope='col'>Status</th>\n";
                    $email = $_SESSION['email'];
                    $recruiter_email = $_SESSION['recruiter_email'];
                    $recruiterArray = explode(", ", $recruiter_email);
                    $rightProject = false; // Assume the project is free
            
                    foreach ($recruiterArray as $recruiterEmail) {
                        if ($recruiterEmail == $email) {
                            $rightProject = true; // If the current user's email is found, set to false
                            break; // Exit the loop early since we found the email
                        }
                    }
                if ($rightProject == true || $_SESSION['PIC'] == true )
                {   
                    echo"<th scope='col'>Actions</th>\n";
                }
                    echo"</tr>\n</thead>\n<tbody>\n";

                // Loop through each row of results and add a table row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                    

                // Common button style for fixed size
                $buttonStyle = "width: 100px; height: 40px; display: inline-block; line-height: 40px; text-align: center;";

                if ($rightProject == true || $_SESSION['PIC'] == true )
                {
                echo "<td>";
                    // Buttons
                echo "<form id='passApplicantForm_" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='PassFailApplicant.php'>
                    <input type='hidden' name='pass_applicant' value='" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                    <button type='button' name='submit_pass'
                        class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                        style='" . $buttonStyle . "' 
                        onclick='confirmPass(\"" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "\")'>
                    Pass
                    </button>
                  </form>";

                echo "<script>
                  function confirmPass(email) {
                      if (confirm('Are you sure you want to pass this applicant?')) {
                          document.getElementById('passApplicantForm_' + email).submit(); // Submit the form for the specific email
                      }
                  }
                </script>";

                    echo "<form id='failApplicantForm_" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='PassFailApplicant.php'>
                    <input type='hidden' name='fail_applicant' value='" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                    <button type='button' name='submit_fail'
                        class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                        style='" . $buttonStyle . "' 
                        onclick='confirmFail(\"" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "\")'>
                    Fail
                    </button>
                  </form>";

                echo "<script>
                  function confirmFail(email) {
                      if (confirm('Are you sure you want to fail this applicant?')) {
                          document.getElementById('failApplicantForm_' + email).submit(); // Submit the form for the specific email
                      }
                  }
                </script>";

                echo "<form id='blackListForm_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='Blacklists.php'>
                        <input type='hidden' name='blacklistApplicant' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ", " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                        <button type='button' id='blacklistApplicantButton_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' 
                            class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                            style='" . $buttonStyle . "' 
                            onclick='confirmBlacklist(\"" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "\")'>
                        Blacklist
                        </button>
                    </form>";

                echo "<script>
                    function confirmBlacklist(ic) {
                        if (confirm('Are you sure you want to blacklist this applicant?')) {
                            document.getElementById('blackListForm_' + ic).submit(); // Submit the form for the specific IC
                        }
                    }
                    </script>";

                echo "<form id='removeApplicantForm_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' method='POST' style='display:inline;' action='Remove_applicant.php'>
                        <input type='hidden' name='removeApplicant' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ", " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                        <button type='button' id='removeApplicantButton_" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "' 
                            class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' 
                            style='" . $buttonStyle . "' 
                            onclick='confirmRemoval(\"" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "\")'>
                        Remove
                        </button>
                    </form>";
                        
                    echo "<script>
                    function confirmRemoval(ic) {
                        if (confirm('Are you sure you want to remove this applicant?')) {
                            document.getElementById('removeApplicantForm_' + ic).submit(); // Submit the form for the specific IC
                        }
                    }
                    </script>";

                    // Edit Button
                    echo "<form method='GET' action='edit_applicant.php' style='display:inline;'>
                        <input type='hidden' name='edit_applicant' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "'>
                        <button type='submit' class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' style='" . $buttonStyle . "'>Edit</button>
                    </form>";


                
                
                echo "</td>\n";
                }
                

                // Close the table
                echo "</tr>\n";
                }

                // Close the table
                echo "</tbody>\n</table>\n";
                echo "</div></div>";
                } else {
                    echo "No records found.";
                }
                } catch (PDOException $e) {
                    echo 'Query failed: ' . $e->getMessage();
                }
                }
                }

                                
                

                // Retrieve and sanitize the project name from the form submission
                if (isset($_POST['pass'])) {
                    $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
                    $_SESSION['status'] = "pass";

                    // Define the query
                    $attendQuery = "SELECT * FROM Applicants WHERE project = ? AND status = 'pass'";

                    // Prepare and execute the query
                    try {
                        $stmt = $conn->prepare($attendQuery);

                        // Check if the preparation was successful
                        if ($stmt === false) {
                            die('Prepare failed: ' . htmlspecialchars($conn->error));
                        }

                        // Bind the project_name parameter to the placeholder
                        $stmt->bind_param("s", $project_name);

                        // Execute the statement
                        $stmt->execute();

                        // Get the result
                        $result = $stmt->get_result();

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Open the table and add headers
                            
                            echo "<table border='1' class='styled-table' width='100%'>\n";
                            echo "<thead>\n<tr>\n"
                                . "<th scope='col'>Date</th>\n"
                                . "<th scope='col'>Name</th>\n"
                                . "<th scope='col'>IC</th>\n"
                                . "<th scope='col'>Contact Number</th>\n"
                                . "<th scope='col'>Email</th>\n"
                                . "<th scope='col'>Project Name</th>\n"
                                . "<th scope='col'>PIC</th>\n"
                                . "<th scope='col'>Remark</th>\n"
                                . "<th scope='col'>Status</th>\n"
                                . "</tr>\n</thead>\n<tbody>\n";

                            // Loop through each row of results and add a table row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>\n";
                                echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "</tr>\n";
                            }

                            // Close the table
                            echo "</tbody>\n</table>\n";
                            echo "</div></div>";
                        } else {
                            echo "No records found.";
                        }
                    } catch (PDOException $e) {
                        echo 'Query failed: ' . $e->getMessage();
                    }
                }


                // Retrieve and sanitize the project name from the form submission
                if (isset($_POST['fail'])) {
                    $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
                    $_SESSION['status'] = "fail";

                    // Define the query
                    $attendQuery = "SELECT * FROM Applicants WHERE project = ? AND status = 'fail'";

                    // Prepare and execute the query
                    try {
                        $stmt = $conn->prepare($attendQuery);

                        // Check if the preparation was successful
                        if ($stmt === false) {
                            die('Prepare failed: ' . htmlspecialchars($conn->error));
                        }

                        // Bind the project_name parameter to the placeholder
                        $stmt->bind_param("s", $project_name);

                        // Execute the statement
                        $stmt->execute();

                        // Get the result
                        $result = $stmt->get_result();

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Open the table and add headers
                            echo "<table border='1' class='styled-table' width='100%'>\n";
                            echo "<thead>\n<tr>\n"
                                . "<th scope='col'>Date</th>\n"
                                . "<th scope='col'>Name</th>\n"
                                . "<th scope='col'>IC</th>\n"
                                . "<th scope='col'>Contact Number</th>\n"
                                . "<th scope='col'>Email</th>\n"
                                . "<th scope='col'>Project Name</th>\n"
                                . "<th scope='col'>PIC</th>\n"
                                . "<th scope='col'>Remark</th>\n"
                                . "<th scope='col'>Status</th>\n"
                                . "</tr>\n</thead>\n<tbody>\n";

                            // Loop through each row of results and add a table row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>\n";
                                echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                                echo "</tr>\n";
                            }

                            // Close the table
                            echo "</tbody>\n</table>\n";
                            echo "</div></div>";
                        } else {
                            echo "No records found.";
                        }
                    } catch (PDOException $e) {
                        echo 'Query failed: ' . $e->getMessage();
                    }
                exit();
                }                 
              ?>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-1a6f">
      
    </footer>
  
</body></html>