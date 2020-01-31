<?php
session_start();
include_once 'includes/database.php';
include_once 'sql.php';
if (isset($_GET['deleteCountry'])) {
    $id = $_GET['deleteCountry'];
    $result1 = keturioliktasSql($dbc, $id);
    while ($row = mysqli_fetch_array($result1)) {
        $countAirlines = $row['countAirlines'];
    }

    $result2 = penkioliktasSql($dbc, $id);
    while ($row = mysqli_fetch_array($result2)) {
        $countAiports = $row['countAirports'];
    }

    if ($countAirlines == 0 && $countAiports == 0) {
        $result = sesioliktasSql($dbc, $id);
        $_SESSION['Success'] = "Country successfully deleted";
        header('Location: countries.php');
    } else {
        $_SESSION['Error'] = "There are some interfaces";
        header('Location: countries.php');
    }
}

if (isset($_GET['deleteAirlines'])) {
    $id = $_GET['deleteAirlines'];
    $result = septyniolikasSql($dbc, $id);
    $result1 = astuonioliktasSql($dbc, $id);
    $_SESSION['Success'] = "Airlines successfully deleted";
    header('Location: airlines.php');
}

if (isset($_GET['deleteAirport'])) {

    $id = $_GET['deleteAirport'];
    $result3 = devynioliktasSql($dbc, $id);
    while ($row = mysqli_fetch_array($result3)) {
        $countAirlinesAirports = $row['countAirlinesAirports'];
    }

    if ($countAirlinesAirports == 0) {
        $result = dvidesimtasSql($dbc, $id);
        $_SESSION['Success'] = "Airport successfully deleted";
        header('Location: airports.php');
    } else {
        $_SESSION['Error'] = "There are some interfaces";
        header('Location: airports.php');
    }
}
