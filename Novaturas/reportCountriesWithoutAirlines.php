<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'sql.php';
?>
<div class="container">

<?php
$resultCountryWithoutAirlines = trisdesimtasSql($dbc);
if (mysqli_num_rows($resultCountryWithoutAirlines) > 0) {
    ?>
                            <h3>Countries without airlines</h3>
<table id="myTable" class="table table-striped table-bordered" >
        <thead>
          <tr>
            <th>Name</th>
            <th>Country code(ISO)</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Country code(ISO)</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
while ($row = mysqli_fetch_assoc($resultCountryWithoutAirlines)) {
        ?>
                              <tr>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['iso']; ?></td>
                            </tr>
                            <?php
}
} else {
    ?><h3>There are no countries without airlines!</h3><?php
}
?>
        </tbody>
      </table>
      </div>
      <?php
include_once 'includes/footer.php';
?>