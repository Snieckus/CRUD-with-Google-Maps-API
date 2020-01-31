<?php
session_start();
include_once('includes/database.php');
$latitude = $_POST["latitudes"];
$longitude = $_POST["longitude"];
$countrySelected = $_POST["countrySelected"];
$name = $_POST["name"];

$CountryIdByNameSql = "SELECT id FROM country WHERE name='$countrySelected'";
$resultCountryIdByName = mysqli_query($dbc, $CountryIdByNameSql);
$row = $resultCountryIdByName->fetch_array();
$id = $row['id']; 
$sqlToFilterIfCountryExists = "SELECT COUNT(country.id) AS countCountriesSelected 
                               FROM country
                               WHERE country.name ='$countrySelected'";
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
        $sql = "INSERT INTO airport (name, latitude, longitude, countryId) VALUES('".$name."', '".$latitude."', '".$longitude."', '".$id."')"; 
        $result = mysqli_query($dbc, $sql);
                if($result)
                {
                    $_SESSION['Success'] = "Airport successfully added";
                    header('Location: airports.php');
                }
                else
                {
                    $_SESSION['Error'] = "Something went wrong with database";
                    header('Location: airports.php');
                }
    } 

        