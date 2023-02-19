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
   $query = "SELECT * FROM 'incident' WHERE Size >= '$_POST[num]'";
   $query2 = "SELECT * FROM 'location'";

    //Run the query
    $result = mysqli_query($link, $query);
    $result2 = mysqli_query($link, $query2);

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