<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php'
?>

<?php
    //read query
   $query = "SELECT incident.Incident_ID, location.Location, location.Region, incident.Sector, incident.Size FROM `incident` INNER JOIN `location` ON incident.Region_ID=location.Region_ID WHERE Size>='$_POST[num]'";

    //Run the query
    $result = mysqli_query($link, $query);

    if(mysqli_query($link, $query))
    {
        header("Location: display.php"); //redirects to display.php
        exit();
    }
    else
    {
        echo "Not Updated";
    }
?>