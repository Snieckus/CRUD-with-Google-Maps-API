<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'sql.php';
if (isset($_GET['editCountry'])) {
    $id = $_GET['editCountry'];
    $result = dvidesimtKetvirtasSql($dbc, $id);
    $row = $result->fetch_array();
    $name = $row['name'];
    $iso = $row['iso'];
    ?>
<div class="container">
    <h3>Edit <?php echo $name ?></h3>
    <table id="myTable" class="table table-striped table-bordered" >
        <tr>
            <td>
            <form action="editCountry.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                Name:<br>
                <input type="text" name="name" value=<?php echo $name ?> pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required><br><br>
                Country code(ISO):<br>
                <input type="text" name="iso" value=<?php echo $iso ?> pattern="[A-Z]{2}/[A-Z]{3}" oninvalid="setCustomValidity('Please enter format [aa/aaa]')" required><br><br>
                <input type="submit" value="Update">
            </form>
            </td>
        </tr>
    </table>
</div>
<?php
}

if (isset($_GET['airlineForAirport'])) {
    $id = $_GET['airlineForAirport'];
    $result = dvidesimtTreciasSql($dbc, $id);
    $row = $result->fetch_array();
    $name = $row['name'];

    ?>
<div class="container">
    <h3>Edit <?php echo $name ?></h3>
    <table id="myTable" class="table table-striped table-bordered" >
        <tr>
            <td>
            <form action="addAirlinesForAirport.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                Airports:<br>
                <select name="idSelected" value="<?php echo $id; ?>">
                                <?php
$result = vienuoliktasSql($dbc);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
    }
    ?>
                                </select>
                                <br><br>
                <input type="submit" value="Update">
            </form>
            </td>
        </tr>
    </table>
</div>
<?php
}

if (isset($_GET['editAirlines'])) {
    $id = $_GET['editAirlines'];
    $result = dvidesimtTreciasSql($dbc, $id);
    $row = $result->fetch_array();
    $name = $row['name'];
    ?>
<div class="container">
    <h3>Edit <?php echo $name ?></h3>
    <table id="myTable" class="table table-striped table-bordered" >
        <tr>
            <td>
            <form action="editArlines.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                Name:<br>
                <input type="text" name="name" value=<?php echo $name ?> pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required><br><br>
                Country:<br>
                <select name="ID" value="<?php echo $id; ?>">
                                <?php
$result = pirmasSql($dbc);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
    }
    ?>
                                </select>
                                <br><br>
                <input type="submit" value="Update">
            </form>
            </td>
        </tr>
    </table>
</div>
<?php
}

if (isset($_GET['editAirport'])) {
    $id = $_GET['editAirport'];
    $result = dvidesimtAntrasSql($dbc, $id);
    $row = $result->fetch_array();
    $name = $row['name'];
    $_SESSION['latitudeView'] = $row['latitude'];
    $_SESSION['longitudeView'] = $row['longitude'];
    $_SESSION['viewID'] = $id;
    $_SESSION['latitudeEdit'] = $row['latitude'];
    $_SESSION['longitudeEdit'] = $row['longitude'];
    $_SESSION['editID'] = $id;
    include_once 'includes/mapScript.php';
    ?>
<div class="container">
    <h3>Edit <?php echo $name; ?> airport</h3>
    <h4>Click and drag somewhere</4h>
    <div id="myMap"></div>
    <form action="editAirport.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="newLatitudes" id="newLatitude">
    <input type="hidden" name="newLongitude" id="newLongitude"></input>
    <input type="text" name="newCountrySelected" id="newCountrySelected" placeholder="Country"> <br><br>
    Name:<br>
    <input type="text" name="newName" value=<?php echo $name ?>><br><br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
}

include_once 'includes/footer.php';
?>