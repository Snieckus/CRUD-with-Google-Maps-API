<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
$name = $_POST['name'];
$iso = $_POST['iso'];
$result = septintasSql($dbc, $name, $iso);
if ($result) {
    $_SESSION['Success'] = "Country successfully added";
    header('Location: countries.php');
} else {
    $_SESSION['Error'] = "Something went wrong with database";
    header('Location: countries.php');
}
