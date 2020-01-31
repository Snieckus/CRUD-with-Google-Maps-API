<?php
session_start();
include_once('includes/database.php');
$name = $_POST['name'];
$newCountry = $_POST['ID'];
$sql = "INSERT INTO airlines (name, countryId) VALUES('".$name."', '".$newCountry."')";
        $result = mysqli_query($dbc, $sql);
        if($result)
        {
            $_SESSION['Success'] = "Airlines successfully added";
            header('Location: airlines.php');
        }
        else
        {
            $_SESSION['Error'] = "Something went wrong with database";
            header('Location: airlines.php');
        }
        