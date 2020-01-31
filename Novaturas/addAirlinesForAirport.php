<?php
session_start();
include_once('includes/database.php');
$airlinesId = $_POST['id'];
    $newAirport = $_POST['idSelected'];
    $sql = "INSERT INTO airportairlines (airportId, airlinesId) VALUES('$newAirport', '$airlinesId')";

        $result = mysqli_query($dbc, $sql);
        if($result)
        {
            $_SESSION['Success'] = "Airlines successfully updated";
            header('Location: airlines.php');
        }
        else
        {
            $_SESSION['Error'] = "Something went wrong with database";
            header('Location: airlines.php');
        }