<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'includes/mapScript.php';
include_once 'sql.php';
?>
<div class="container">
    <h3>Add new airport</h3>
    <h4>Click and drag somewhere</4h>
<div id="myMap"></div>
<form action="addNewAirportFinal.php" method="POST">
    <input type="hidden" name="latitudes" id="latitude">
    <input type="hidden" name="longitude" id="longitude"></input>
    <input type="text" name="countrySelected" id="countrySelected" placeholder="Country"> <br><br>
    Name:<br>
    <input type="text" name="name" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required><br><br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
include_once 'includes/footer.php';
?>