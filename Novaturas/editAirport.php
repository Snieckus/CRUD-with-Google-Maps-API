<?php
session_start();
include_once('includes/database.php');
$airportID = $_POST['id'];
$newLatitude = $_POST["newLatitudes"];
$newLongitude = $_POST["newLongitude"];
$newCountrySelected = $_POST["newCountrySelected"];
$newName = $_POST["newName"];

$CountryIdByNameSql = "SELECT id FROM country WHERE name='$newCountrySelected'";
$resultCountryIdByName = mysqli_query($dbc, $CountryIdByNameSql);
$row = $resultCountryIdByName->fetch_array();
$id = $row['id']; 
$sqlToFilterIfCountryExists = "SELECT COUNT(country.id) AS countCountriesSelected 
                               FROM country
                               WHERE country.name ='$newCountrySelected'";
$resultCountriesFiltered = mysqli_query($dbc, $sqlToFilterIfCountryExists);
$row = $resultCountriesFiltered->fetch_array();
$countCountriesSelected = $row['countCountriesSelected']; 
if($countCountriesSelected == 0)
    {
        $_SESSION['Error'] = "Please choose from countries list";
        header('Location: airports.php');
    }    
    else
    {
        $sql = "UPDATE airport SET name='$newName', latitude=$newLatitude, longitude=$newLongitude, countryId=$id WHERE id=$airportID"; 
        $result = mysqli_query($dbc, $sql);
                if($result)
                {
                    $_SESSION['Success'] = "Airport successfully edited";
                    header('Location: airports.php');
                }
                else
                {
                    $_SESSION['Error'] = "Something went wrong with database";
                    header('Location: airports.php');
                }
    } 

        