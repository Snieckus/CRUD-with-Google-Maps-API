<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
$name = $_POST['name'];
$newCountry = $_POST['ID'];
$result = treciasSql($dbc, $name, $newCountry);
if ($result) {
    $_SESSION['Success'] = "Airlines successfully added";
    header('Location: airlines.php');
} else {
    $_SESSION['Error'] = "Something went wrong with database";
    header('Location: airlines.php');
}
