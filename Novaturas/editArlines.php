<?php
session_start();
include_once('includes/database.php');
$id = $_POST['id'];
$name = $_POST['name'];
$newCountry = $_POST['ID'];
$sql = "UPDATE airlines SET name='$name', countryId=$newCountry WHERE id=$id";

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