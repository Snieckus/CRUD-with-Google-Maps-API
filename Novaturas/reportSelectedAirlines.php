<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'sql.php';
?>
<div class="container">

<?php
$newCountry = $_POST['ID'];
$resultCountryWithoutAirlines = trisdesimtAntrasSql($dbc, $newCountry);
if (mysqli_num_rows($resultCountryWithoutAirlines) > 0) {
    ?>
                            <h3>Airports to which only the airlines of the selected country fly</h3>
<table id="myTable" class="table table-striped table-bordered" >
        <thead>
          <tr>
          <th>Name</th>
            <th>Location</th>
            <th>Airlines</th>
            <th>Country</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Airlines</th>
            <th>Country</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
while ($row = mysqli_fetch_assoc($resultCountryWithoutAirlines)) {
        ?>
                              <tr>
                                  <?php $_SESSION['airportID'] = $row['id']?>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['latitude']; ?>.<?php echo $row['longitude']; ?></td>
                                  <?php
$result = trisdesimtTreciasSql($dbc, $row['id']);

        ?>
                                  <td><?php if (mysqli_num_rows($result) > 0) {?><select name="ID">
                                  <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
            }
            ?>
                                  </select>
                                  <?php
} else {
            echo "There are no airlines";
        }
        ?>
                                 </td>
                                  <?php
$result = trisdesimtKetvirtasSql($dbc, $_SESSION['airportID']);
        $row = $result->fetch_array();
        $name = $row['name'];

        ?>
                                  <td><?php echo $name; ?></td>
                            </tr>
                            <?php
}
} else {
    ?><h3>There are no airports!</h3><?php
}
?>
        </tbody>
      </table>
                        </div>
                        <?php
include_once 'includes/footer.php';
?>