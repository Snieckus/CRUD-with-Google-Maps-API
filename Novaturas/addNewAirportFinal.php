<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
$latitude = $_POST["latitudes"];
$longitude = $_POST["longitude"];
$countrySelected = $_POST["countrySelected"];
$name = $_POST["name"];
$resultCountryIdByName = ketvirtasSql($dbc, $countrySelected);
$row = $resultCountryIdByName->fetch_array();
$id = $row['id'];
$resultCountriesFiltered = penktasSql($dbc, $countrySelected);
$row = $resultCountriesFiltered->fetch_array();
$countCountriesSelected = $row['countCountriesSelected'];
if ($countCountriesSelected == 0) {
    $_SESSION['Error'] = "Please choose from countries list";
    header('Location: airports.php');
} else {

    $result = sestasSql($dbc, $name, $latitude, $longitude, $id);
    if ($result) {
        $_SESSION['Success'] = "Airport successfully added";
        header('Location: airports.php');
    } else {
        $_SESSION['Error'] = "Something went wrong with database";
        header('Location: airports.php');
    }
}
