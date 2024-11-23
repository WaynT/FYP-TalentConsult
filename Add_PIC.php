<?php
session_start();

require_once "settings.php";

$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $Projectname = $_POST["projectname"];
    $Client = $_POST["client"];
    $Applicants = $_POST["applicants"];
    $Priority = $_POST["priority"];
    $Remarks = $_POST["remarks"];

    
        $query = "INSERT INTO PIC (projectname, client, applicants, priority, remarks) VALUES ('$Projectname', '$Client', '$Applicants', '$Priority', '$Remarks')";
        if (mysqli_query($conn, $query))
        {
            header ("Location: Lists_PIC.php");
            exit();
        }
        else
        {
        echo "Adding failed: " . mysqli_error($conn);
        }
    
}
mysqli_close($conn);
?>