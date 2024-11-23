<?php
include "settings.php";
session_start();

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['blacklistApplicant'])) {
        $project_name = htmlspecialchars($_SESSION['project_name'], ENT_QUOTES, 'UTF-8');
        $applicantData = htmlspecialchars($_POST['blacklistApplicant'], ENT_QUOTES, 'UTF-8');

        // Use explode() to split the string by the comma
        $parts = explode(",", $applicantData);

        // Assign the separated parts to variables
        $applicant_ic = trim($parts[0]);  // Trim to remove any leading or trailing spaces
        $applicant_email = trim($parts[1]);

        // Prepare the query with placeholders
        $blacklistQuery = "UPDATE Applicants SET status = 'blacklist' WHERE IC = ? AND project = ? AND email = ? ";

        $stmt = $conn->prepare($blacklistQuery);
        $stmt->bind_param("sss", $applicant_ic, $project_name, $applicant_email);
        $stmt->execute();

        // Redirect to another page after processing
        header("Location: Project_Recruiters.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Blacklists</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Blacklists.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": ""
        }
    </script>
    <style>
        /* General table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        /* Table borders and padding */
        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        /* Header row styling */
        th {
            background-color: #E21818;
            color: white;
            font-weight: 600;
            text-align: center;
        }

        /* Even row background color */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Row hover effect */
        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Responsive table adjustments */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }
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
        }

        /* Hover effect for the sign-out button */
        .sign-out-button:hover {
            background-color: #E21818; /* Red background */
            color: white; /* White text color */
            border-color: #E21818; /* Maintain red border */
        }

    </style>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Lists_PIC">
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
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                    </g></svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                    <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Blacklists.php" style="padding: 10px 0px;">Blacklists</a>
                        <div class="u-nav-popup">
                            <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Lists_PIC.php">Lists</a></li>
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Projects.php">Projects</a></li>
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Applicants.php">Applicants</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="PICcontrol.php" style="padding: 10px 0px;">Recruiters</a></li>
                	<li class="u-nav-item"><a class="sign-out-button" href="Login.html">Sign Out</a></li>
                    <li class="u-nav-item">
                        <span class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" style="padding: 10px 0px;">
                            <?php echo htmlspecialchars($_SESSION['email']); ?>
                        </span>
                    </li>
                    </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                       
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
    </div>
</header>

<section class="u-clearfix u-section-1" id="sec-bc4f">
    <div class="u-clearfix u-sheet u-sheet-1">
                <form action="Blacklists.php" method="GET">
                  <input type="text" name="search" placeholder="Search by Applicant's Details">
                  <button type="submit" name="searchBtn">Search</button>
                </form>

                <?php
                // Check if the search query is provided
                if (isset($_GET['searchBtn'])) {
                // Get the search query from the GET parameters
                $search = '%' . $_GET['search'] . '%';

                // Prepare the SQL query to search for the project name or client
                $searchQuery = "SELECT * FROM Applicants 
                WHERE (date LIKE ? 
                OR name LIKE ? 
                OR IC LIKE ? 
                OR contact_num LIKE ? 
                OR email LIKE ? 
                OR project LIKE ? 
                OR PIC LIKE ? 
                OR remark LIKE ?) 
                AND status = 'blacklist' 
                ORDER BY project";

                // Prepare and execute the query
                try {
                    $stmt = $conn->prepare($searchQuery);

                    // Check if the preparation was successful
                    if ($stmt === false) {
                        die('Prepare failed: ' . htmlspecialchars($conn->error));
                    }

                    // Bind parameters to the placeholders
                    $stmt->bind_param("ssssssss", $search, $search, $search, $search, $search, $search, $search, $search);

                    // Execute the statement
                    $stmt->execute();

                    // Get the result
                    $searchResult = $stmt->get_result();

                    // Check if there are any results
                    if ($searchResult->num_rows > 0) {
                        echo "<div class=''><div class='u-container-layout u-container-layout-1'>";
                        echo "<table>\n";
                        echo "<tr>\n"
                            . "<th scope='col'>Date</th>\n"
                            . "<th scope='col'>Name</th>\n"
                            . "<th scope='col'>IC</th>\n"
                            . "<th scope='col'>Contact Number</th>\n"
                            . "<th scope='col'>Email</th>\n"
                            . "<th scope='col'>Project Name</th>\n"
                            . "<th scope='col'>PIC</th>\n"
                            . "<th scope='col'>Remark</th>\n"
                            . "<th scope='col'>Status</th>\n"
                            . "<th scope='col'>Actions</th>\n"
                            . "</tr>\n";

                        while ($row = $searchResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>
                            <form method='POST' action='unblacklist.php' style='display:inline;'>
                                <input type='hidden' name='unblacklist_IC' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ", " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                                <button type='submit' name='submit_unblacklist' class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' style='" . $buttonStyle . "'>Unblacklist</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                        echo "</table></div></div>";
                    } else {
                        echo "No records found.";
                    }
                } catch (Exception $e) {
                    echo 'Query failed: ' . $e->getMessage();
                }
            }
            else {
                // Display the blacklist
                $displayBlacklist = "SELECT * FROM Applicants WHERE status = 'blacklist'";

                try {
                    $stmt = $conn->prepare($displayBlacklist);

                    // Check if the preparation was successful
                    if ($stmt === false) {
                        throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
                    }

                    // Execute the statement
                    $stmt->execute();

                    // Get the result
                    $result = $stmt->get_result();

                    // Common button style for fixed size
                    $buttonStyle = "width: 100px; height: 40px; display: inline-block; line-height: 40px; text-align: center;";

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        echo "<div class=''><div class='u-container-layout u-container-layout-1'>";
                        echo "<table>\n";
                        echo "<tr>\n"
                            . "<th scope='col'>Date</th>\n"
                            . "<th scope='col'>Name</th>\n"
                            . "<th scope='col'>IC</th>\n"
                            . "<th scope='col'>Contact Number</th>\n"
                            . "<th scope='col'>Email</th>\n"
                            . "<th scope='col'>Project Name</th>\n"
                            . "<th scope='col'>PIC</th>\n"
                            . "<th scope='col'>Remark</th>\n"
                            . "<th scope='col'>Status</th>\n"
                            . "<th scope='col'>Actions</th>\n"
                            . "</tr>\n";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['contact_num'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['PIC'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>\n";
                            echo "<td>
                            <form method='POST' action='unblacklist.php' style='display:inline;'>
                                <input type='hidden' name='unblacklist_IC' value='" . htmlspecialchars($row['IC'], ENT_QUOTES, 'UTF-8') . ", " . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "'>
                                <button type='submit' name='submit_unblacklist' class='btn btn-small u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius' style='" . $buttonStyle . "'>Unblacklist</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                        echo "</table></div></div>";
                    }
                } catch (Exception $e) {
                    // Handle any errors that occur during the display query
                    echo "Error: " . $e->getMessage();
                } finally {
                    // Close the statement and connection
                    if ($stmt) {
                        $stmt->close();
                    }
                    $conn->close();
                }
            }
            ?>

    </div>
</section>
</body>
</html>
