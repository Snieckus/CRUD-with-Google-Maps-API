<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "novaturas";

// Create connection
$dbc=mysqli_connect($servername, $username, $password, $database);
                    if(!$dbc){
                        die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
                    }
?>