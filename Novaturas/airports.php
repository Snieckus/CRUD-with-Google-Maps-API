<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'sql.php';
session_start();
?>
<div class="container">
<h3>Airports</h3>
<div align="right">
<a href="addAirport.php"><h3>Add new airport</h3></a>
</div>
<div>
<?php
if (isset($_SESSION['Error'])) {
    ?><p style="font-weight: bold; background-color:red"><?php echo $_SESSION['Error']; ?></p><?php
unset($_SESSION['Error']);
} else if (isset($_SESSION['Success'])) {
    ?><p style="font-weight: bold; background-color:green"><?php echo $_SESSION['Success']; ?></p><?php
unset($_SESSION['Success']);
}
?>
</div>
<?php
$resultAirport = vienuoliktasSql($dbc);
if (mysqli_num_rows($resultAirport) > 0) {
    ?>
<table id="myTable" class="table table-striped table-bordered" >
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Airlines</th>
            <th>Country</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th>Airlines</th>
              <th>Country</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
while ($row = mysqli_fetch_assoc($resultAirport)) {
        ?>
                              <tr>
                                  <?php $_SESSION['airportID'] = $row['id']?>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['latitude']; ?>.<?php echo $row['longitude']; ?></td>
                                  <?php
$result = dvyliktasSql($dbc, $row['id']);
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

        $result = tryliktasSql($dbc, $_SESSION['airportID']);
        $row = $result->fetch_array();
        $name = $row['name'];

        ?>
                                  <td><?php echo $name; ?></td>
                                  <td>
                                      <a href="viewAirport.php?viewAirport=<?php echo $_SESSION['airportID'] ?>"
                                         class="btn btn-info">View</a>

                                  </td>
                                  <td>
                                      <a href="edit.php?editAirport=<?php echo $_SESSION['airportID'] ?>"
                                         class="btn btn-primary">Edit</a>

                                  </td>
                                  <td>
                                      <a href="delete.php?deleteAirport=<?php echo $_SESSION['airportID']; ?>"
                                         class="btn btn-danger">Delete</a>

                                  </td>
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