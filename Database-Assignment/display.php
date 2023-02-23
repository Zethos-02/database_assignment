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

<!-- Sets up CSS style -->
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Invoice Form Read</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <style>
                html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
                .w3-sidebar {
                z-index: 3;
                width: 250px;
                top: 43px;
                bottom: 0;
                height: inherit;
            }
            </style>
        </head>

        <body>

            <!-- Navbar -->
            <div class="w3-top">
                <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
                    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
                    <a href="index.php" class="w3-bar-item w3-button w3-theme-l1">Intro</a>
                    <a href="invAdd.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Create</a>
                    <a href="invDelete.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Delete</a>
                    <a href="invUpdate.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Update</a>
                    <a href="invRead.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Read</a>
                </div>
            </div>

            <!-- Sidebar -->
            <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4 class="w3-bar-item"><b>Menu</b></h4>
                <a class="w3-bar-item w3-button w3-hover-black" href="index.php">Intro</a>
                <a class="w3-bar-item w3-button w3-hover-black" href="invAdd.php">Create</a>
                <a class="w3-bar-item w3-button w3-hover-black" href="invDelete.php">Delete</a>
                <a class="w3-bar-item w3-button w3-hover-black" href="invUpdate.php">Update</a>
                <a class="w3-bar-item w3-button w3-hover-black" href="invRead.php">Read</a>
            </nav>

            <!-- Overlay effect when opening sidebar on small screens -->
            <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
                <div class="w3-main" style="margin-left:250px">

                    <div class="w3-row w3-padding-64">
                    <div class="w3-twothird w3-container">
                    <h1 class="w3-text-teal">Read</h1>
                    <p>In this page, the database is displayed below to show every entry with all the relevant information.</p>
                </div>
            </div>

            <!-- Table with only the records -->
            <div class="w3-row">
                <div class="w3-twothird w3-container">
                    <h1 class="w3-text-teal">Database</h1>
                    <table>
                    <table cellspacing="0" cellpadding="1" border="1" width=auto>
                        <tr>
                            <th>ID</th>
                            <th>Sector</th>
                            <th>Size</th>
                            <th>Location</th>
                            <th>Region</th>
                        </tr>

                    <?php
                        //read query
                        $query = "SELECT incident.Incident_ID, incident.Sector, incident.Size, location.Location, location.Region FROM `incident` INNER JOIN `location` ON incident.Region_ID=location.Region_ID WHERE Size>=5000";

                        //Run the query
                        $result = mysqli_query($link, $query);

                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            echo "<td><input type=number name=ID value='" . $row['Incident_ID'] . "'></td>";
                            echo "<td><input type=text name=Sector value='" . $row['Sector'] . "'></td>";
                            echo "<td><input type=text name=Size value='" . $row['Size'] . "'></td>";
                            echo "<td><input type=text name=Location value='" . $row['Location'] . "'></td>";
                            echo "<td><input type=text name=Region value='" . $row['Region'] . "'></td>";
                            echo "</form></tr>";
                        }
                    ?>    
                </div>  
            </div>

            <!-- END MAIN -->
            </div>

            <script>
                // Get the Sidebar
                var mySidebar = document.getElementById("mySidebar");

                // Get the DIV with overlay effect
                var overlayBg = document.getElementById("myOverlay");

                // Toggle between showing and hiding the sidebar, and add overlay effect
                function w3_open() {
                    if (mySidebar.style.display === 'block') {
                        mySidebar.style.display = 'none';
                        overlayBg.style.display = "none";
                    } else {
                        mySidebar.style.display = 'block';
                        overlayBg.style.display = "block";
                    }
                }

                // Close the sidebar with the close button
                function w3_close() {
                    mySidebar.style.display = "none";
                    overlayBg.style.display = "none";
                }
            </script>

        </body>
    </html>
