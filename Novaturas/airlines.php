<?php
include_once('includes/header.php');
include_once('includes/database.php');
session_start();
?>
<div class="container">
<h3>Airlines</h3>
<div align="right">
<a href="addAirlines.php"><h3>Add new airline</h3></a>
</div>
<div>
<?php
if( isset($_SESSION['Error']) )
{
        ?><p style="font-weight: bold; background-color:red"><?php echo $_SESSION['Error'];?></p><?php
        unset($_SESSION['Error']);
}
else if( isset($_SESSION['Success']))
{
    ?><p style="font-weight: bold; background-color:green"><?php echo $_SESSION['Success'];?></p><?php
    unset($_SESSION['Success']);
}
?>
</div>
<?php
$sql = "SELECT * FROM airlines";
$resultAirline = mysqli_query($dbc, $sql);
if (mysqli_num_rows($resultAirline) > 0)
                        {                        
                            ?>
<table id="myTable" class="table table-striped table-bordered" >  
        <thead>  
          <tr>  
            <th>Name</th>  
            <th>Country</th>
            <th>Add to airport</th>
            <th>Edit</th>
            <th>Delete</th>  
          </tr>  
        </thead>
        <tfoot>
            <tr>  
                <th>Name</th>  
                <th>Country</th>
                <th>Add to airport</th>
                <th>Edit</th>
                <th>Delete</th>    
            </tr>
        </tfoot>  
        <tbody>  
        <?php
                        while($row = mysqli_fetch_assoc($resultAirline))
                         {                     
                             ?>
                              <tr>
                                  <td><?php echo $row['name']; ?></td>
                                  <?php
                                      $sql = "SELECT name FROM country WHERE id=".$row['countryId']."";
                                      
                                      $result = mysqli_query($dbc, $sql);
                                      $_SESSION['id'] = $row['id'];
                                      $row = $result->fetch_array();
                                      $name = $row['name'];                                    
                                  ?>
                                  <td><?php echo $name; ?></td>
                                  <td>
                                      <a href="edit.php?airlineForAirport=<?php echo $_SESSION['id'] ?>"
                                         class="btn btn-primary">Add to airport</a>
                                                           
                                  </td>
                                  <td>
                                      <a href="edit.php?editAirlines=<?php echo $_SESSION['id'] ?>"
                                         class="btn btn-primary">Edit</a>
                                                           
                                  </td>
                                  <td>
                                      <a href="delete.php?deleteAirlines=<?php echo $_SESSION['id']; ?>"
                                         class="btn btn-danger">Delete</a>
                                                           
                                  </td>
                            </tr>
                            <?php                         
                         }
                        }
                         else
                         {
                             ?><h3>There are no airlines!</h3><?php
                         }
                         ?>
        </tbody>  
      </table>  
	  </div>
<?php
include_once('includes/footer.php');
?>