<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
$airportID = $_POST['id'];
$newLatitude = $_POST["newLatitudes"];
$newLongitude = $_POST["newLongitude"];
$newCountrySelected = $_POST["newCountrySelected"];
$newName = $_POST["newName"];
$resultCountryIdByName = dvidesimtPenktasSql($dbc, $newCountrySelected);
$row = $resultCountryIdByName->fetch_array();
$id = $row['id'];
$resultCountriesFiltered = dvidesimtSestasSql($dbc, $newCountrySelected);
$row = $resultCountriesFiltered->fetch_array();
$countCountriesSelected = $row['countCountriesSelected'];
if ($countCountriesSelected == 0) {
    $_SESSION['Error'] = "Please choose from countries list";
    header('Location: airports.php');
} else {
    $result = dvidesimtSeptintasSql($dbc, $newName, $newLatitude, $newLongitude, $id, $airportID);
    if ($result) {
        $_SESSION['Success'] = "Airport successfully edited";
        header('Location: airports.php');
    } else {
        $_SESSION['Error'] = "Something went wrong with database";
        header('Location: airports.php');
    }
}
