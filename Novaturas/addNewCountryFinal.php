<?php
session_start();
include_once('includes/database.php');
$name = $_POST['name'];
$iso = $_POST['iso'];
$sql = "INSERT INTO country (name, iso) VALUES('".$name."', '".$iso."')";
        $result = mysqli_query($dbc, $sql);
        if($result)
        {
            $_SESSION['Success'] = "Country successfully added";
            header('Location: countries.php');
        }
        else
        {
            $_SESSION['Error'] = "Something went wrong with database";
            header('Location: countries.php');
        }
        