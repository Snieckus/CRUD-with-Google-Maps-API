<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
$id = $_POST['id'];
$name = $_POST['name'];
$newCountry = $_POST['ID'];
$result = dvidesimtAstuntasSql($dbc, $name, $newCountry, $id);
if ($result) {
    $_SESSION['Success'] = "Airlines successfully updated";
    header('Location: airlines.php');
} else {
    $_SESSION['Error'] = "Something went wrong with database";
    header('Location: airlines.php');
}
