<?php
session_start();
include_once 'sql.php';
include_once 'includes/database.php';
$airlinesId = $_POST['id'];
$newAirport = $_POST['idSelected'];
$result = antrasSql($dbc, $newAirport, $airlinesId);
if ($result) {
    $_SESSION['Success'] = "Airlines successfully updated";
    header('Location: airlines.php');
} else {
    $_SESSION['Error'] = "Something went wrong with database";
    header('Location: airlines.php');
}
