<?php
session_start();
include_once('includes/database.php');
if(isset($_GET['deleteCountry']))
{
    $id = $_GET['deleteCountry'];

    $airlinesCountSql = "SELECT COUNT(airlines.id) AS countAirlines
                       FROM country INNER JOIN airlines ON country.id = airlines.countryId
                       WHERE country.id = $id";
    $result1 = mysqli_query($dbc, $airlinesCountSql);
    while ($row = mysqli_fetch_array($result1)) 
    {
        $countAirlines = $row['countAirlines'];     
    } 



    $airportsCountSql = "SELECT COUNT(airport.id) AS countAirports
                       FROM country INNER JOIN airport ON country.id = airport.countryId
                       WHERE country.id = $id";
    $result2 = mysqli_query($dbc, $airportsCountSql);
    while ($row = mysqli_fetch_array($result2)) 
    {
        $countAiports = $row['countAirports'];     
    }  



    if($countAirlines == 0 && $countAiports == 0)
    {
        $sql = "DELETE FROM country WHERE id=$id";
        $result = mysqli_query($dbc, $sql);
        $_SESSION['Success'] = "Country successfully deleted";
        header('Location: countries.php');
    }    
    else
    {
        $_SESSION['Error'] = "There are some interfaces";
        header('Location: countries.php');
    } 
}


if(isset($_GET['deleteAirlines']))
{
    $id = $_GET['deleteAirlines'];
    $deleteFromAirportAirlines = "DELETE FROM airportairlines WHERE airlinesId=$id";
    $result = mysqli_query($dbc, $deleteFromAirportAirlines);
    $sql = "DELETE FROM airlines WHERE id=$id";
    $result1 = mysqli_query($dbc, $sql);
    $_SESSION['Success'] = "Airlines successfully deleted";
    header('Location: airlines.php');
}


if(isset($_GET['deleteAirport']))
{

    $id = $_GET['deleteAirport'];

    $airlinesAirportsCountSql = "SELECT COUNT(airlines.id) AS countAirlinesAirports
                       FROM airportairlines LEFT JOIN airlines ON airportairlines.airlinesId = airlines.id
                       LEFT JOIN airport ON airportairlines.airportId = airport.id
                       WHERE airport.id = $id";
                       
    $result3 = mysqli_query($dbc, $airlinesAirportsCountSql);
    while ($row = mysqli_fetch_array($result3)) 
    {
        $countAirlinesAirports = $row['countAirlinesAirports'];     
    } 

    if($countAirlinesAirports == 0)
    {
        $sql = "DELETE FROM airport WHERE id=$id";
        $result = mysqli_query($dbc, $sql);
        $_SESSION['Success'] = "Airport successfully deleted";
        header('Location: airports.php');
    }    
    else
    {
        $_SESSION['Error'] = "There are some interfaces";
        header('Location: airports.php');
    } 
}
?>