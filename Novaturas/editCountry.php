<?php
session_start();
include_once('includes/database.php');
$id = $_POST['id'];
$name = $_POST['name'];
$iso = $_POST['iso'];
$sql = "UPDATE country SET name='$name', iso='$iso' WHERE id=$id";
        $result = mysqli_query($dbc, $sql);
        if($result)
        {
            $_SESSION['Success'] = "Country successfully updated";
            header('Location: countries.php');
        }
        else
        {
            $_SESSION['Error'] = "Something went wrong with database";
            header('Location: countries.php');
        }