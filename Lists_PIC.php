<?php
session_start();

require_once "settings.php";

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM PIC ORDER BY priority DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$pic_status = isset($_SESSION['PIC']) ? $_SESSION['PIC'] : false;
$user_email = isset($_SESSION['email']) ? mysqli_real_escape_string($conn, $_SESSION['email']) : null;
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>List of Projects</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Lists_PIC.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
<style>
        .priority-1 {
            color: lightblue;
            font-weight: bold;
        }
        .priority-2 {
            color: lightgreen;
            font-weight: bold;
        }
        .priority-3 {
            color:rgb(122, 122, 1);
            font-weight: bold;
        }
        .priority-4 {
            color:  rgb(125, 82, 2);
            font-weight: bold;
        }
        .priority-5 {
            color: red;
            font-weight: bold;
        }
        .project-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin: 16px 0;
            background-color: #f9f9f9;}
        
          .button-container {
            display: flex;
            gap: 8px;
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
        
        /* Button Styles */
.u-btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 8px; /* Slightly rounded corners */
    background-color: #FF0000; /* Red color */
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.u-btn:hover {
    background-color: #cc0000; /* Slightly darker red for hover effect */
}

.u-btn-round {
    border-radius: 8px; /* Slightly rounded corners */
}

/* Additional button style for specific classes if needed */
.u-button-style {
    /* Add any additional specific styles here if necessary */
}

/* Styling for the search form container */
.search-form-container {
    text-align: left;
    margin: auto;
}

/* Base styling for the search button */
button[type="submit"] {
    background-color: #E21818;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hover effect for the search button */
button[type="submit"]:hover {
    background-color: #c81010;
    color: #fff;
}

/* Styling for the search input field */
input[type="text"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    width: 500px;
    box-sizing: border-box;
}
        
/* Common button styles */
.common-button {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 8px; /* Slightly rounded corners */
    background-color: #FF0000; /* Red color */
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.common-button:hover {
    background-color: #cc0000; /* Slightly darker red for hover effect */
}

        
</style>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Lists_PIC">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <link rel="icon" type="images/png" href="images/image.png">
        </head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">

</g></svg>
            </a>
          </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                    <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Lists_PIC.php" style="padding: 10px 0px;">Lists</a>
                        <div class="u-nav-popup">
                            <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Blacklists.php">Blacklists</a></li>
                                <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Projects.php">Projects</a></li>
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
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Login.html">Lists</a><div class="u-nav-popup"><ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12"><li class="u-nav-item"><a class="u-button-style u-nav-link">Blacklist</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link">Projects</a>
</li></ul>
</div>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-bc4f">
      <div class="u-clearfix u-sheet u-sheet-1">
      <?php if ($pic_status === true): ?>
        <div style="text-align: center;">
    		<a href="Add_PIC.html" class="u-active-palette-2-light-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-light-1 u-radius u-btn-1">ADD</a>
		</div>
        <?php endif; ?>
        <div class="u-border-3 u-border-grey-90 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
          <form action="Lists_PIC.php" method="GET" class="search-form-container">
    		<input type="text" name="search" placeholder="Search by Project Name or Client">
    		<button type="submit" name="searchBtn">Search</button>
		  </form>
        <?php
          // Check if the search query is provided
          if (isset($_GET['searchBtn'])) {
          // Get the search query from the GET parameters
          $search = $_GET['search'];

          // Prepare the SQL query to search for the project name or client
          $searchQuery = "SELECT * FROM PIC WHERE projectname LIKE '%$search%' OR client LIKE '%$search%' ORDER BY priority DESC";
          $searchResult = mysqli_query($conn, $searchQuery);

          // Check if the query was successful
          if ($searchResult) {
          // Output the search results dynamically without reloading the page
                  while ($row = mysqli_fetch_assoc($searchResult)) {

                    $priorityClass = '';
                    switch ($row['priority']) {
                    case '1':
                      $priorityClass = 'priority-1';
                      break;
                    case '2':
                      $priorityClass = 'priority-2';
                      break;
                    case '3':
                      $priorityClass = 'priority-3';
                      break;
                    case '4':
                      $priorityClass = 'priority-3';
                      break;
                    case '5':
                      $priorityClass = 'priority-5';
                      break;
                  }
                  echo "<div class='project-box'>";
                  echo "<h3>Project Name: " . $row['projectname'] . "</h3>";
                  echo "<p>Client: " . $row['client'] . "</p>";
                  echo "<p>Applicants: " . $row['applicants'] . "</p>";
                  echo "<p class='{$priorityClass}'>Priority: " . $row['priority'] . "</p>";
                  echo "<p>Remarks: " . $row['remarks'] . "</p>";
                  echo "<div class='button-container'>";
                  if ($pic_status === true) {
                    echo "<a href='edit_project.php?projectname=" . urlencode($row['projectname']) . "' class='common-button'>Edit</a>";
                }
                  echo "<form method='POST' action='Projects.php' style='display:inline;'>
                <input type='hidden' name='project_name' value='".htmlspecialchars($row['projectname'])."'>
                <button type='submit' formaction='Project_Recruiters.php' class='common-button'>View</button>
              </form>";
                  echo "</div>";
                  echo "</div>";
                  }
            } else {
            // If the query fails, display an error message
            echo "Query failed: " . mysqli_error($conn);
          }
        }
        else if(!isset($_GET['searchBtn'])){
          while ($row = mysqli_fetch_assoc($result)) {

            $priorityClass = '';
            switch ($row['priority']) {
            case '1':
              $priorityClass = 'priority-1';
              break;
            case '2':
              $priorityClass = 'priority-2';
              break;
            case '3':
              $priorityClass = 'priority-3';
              break;
            case '4':
              $priorityClass = 'priority-3';
              break;
            case '5':
              $priorityClass = 'priority-5';
              break;
          }
          echo "<div class='project-box'>";
          echo "<h3>Project Name: " . $row['projectname'] . "</h3>";
          echo "<p>Client: " . $row['client'] . "</p>";
          echo "<p>Applicants: " . $row['applicants'] . "</p>";
          echo "<p class='{$priorityClass}'>Priority: " . $row['priority'] . "</p>";
          echo "<p>Remarks: " . $row['remarks'] . "</p>";
          echo "<div class='button-container'>";
          if ($pic_status === true) {
            echo "<a href='edit_project.php?projectname=" . urlencode($row['projectname']) . "' class='common-button'>Edit</a>";
        }
        echo "<form method='POST' action='Projects.php' style='display:inline;'>
                <input type='hidden' name='project_name' value='".htmlspecialchars($row['projectname'])."'>
                <button type='submit' formaction='Project_Recruiters.php' class='common-button'>View</button>
              </form>";
           echo "</div>";
          echo "</div>";
          }
        }
          ?>
          </div>
        </div>
      </div>
    </section>
  
</body></html>