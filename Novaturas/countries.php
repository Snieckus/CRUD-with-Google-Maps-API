<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'sql.php';
session_start();
?>
<div class="container">
<h3>Countries</h3>
<div align="right">
<a href="addCountry.php"><h3>Add new country</h3></a>
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
$resultCountry = pirmasSql($dbc);
if (mysqli_num_rows($resultCountry) > 0) {
    ?>
<table id="myTable" class="table table-striped table-bordered" >
        <thead>
          <tr>
            <th>Name</th>
            <th>Country code(ISO)</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Country code(ISO)</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
while ($row = mysqli_fetch_assoc($resultCountry)) {
        ?>
                              <tr>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['iso']; ?></td>
                                  <td>
                                      <a href="edit.php?editCountry=<?php echo $row['id']; ?>"
                                         class="btn btn-primary">Edit</a>

                                  </td>
                                  <td>
                                      <a href="delete.php?deleteCountry=<?php echo $row['id']; ?>"
                                         class="btn btn-danger">Delete</a>

                                  </td>
                            </tr>
                            <?php
}
} else {
    ?><h3>There are no countries!</h3><?php
}
?>
        </tbody>
      </table>
	  </div>
<?php
include_once 'includes/footer.php';
?>