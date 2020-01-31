<?php
session_start();
include_once('includes/header.php');
include_once('includes/database.php');
include_once('includes/mapScript.php');

$id = $_GET['viewAirport'];
$sql = "SELECT * FROM airport WHERE id=$id";
    $result = mysqli_query($dbc, $sql);
    $row = $result->fetch_array();
    $name = $row['name'];
    $_SESSION['latitudeView'] = $row['latitude'];
    $_SESSION['longitudeView'] = $row['longitude'];
    $_SESSION['viewID'] = $id;
?>
<div class="container">
    <h3><?php echo $name ?> airport</h3>
<div id="myMap"></div>
<input id="address" type="text" style="width:600px;"/><br/>
</div>
<?php
include_once('includes/footer.php');
?>