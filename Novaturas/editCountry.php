<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
$id = $_POST['id'];
$name = $_POST['name'];
$iso = $_POST['iso'];
$result = dvidesimtDevintasSql($dbc, $name, $iso, $id);
if ($result) {
    $_SESSION['Success'] = "Country successfully updated";
    header('Location: countries.php');
} else {
    $_SESSION['Error'] = "Something went wrong with database";
    header('Location: countries.php');
}
