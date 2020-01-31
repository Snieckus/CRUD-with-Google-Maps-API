<?php
include_once('includes/header.php');
include_once('includes/database.php');
session_start();
?>
<div class="container">
<h3>Airports</h3>
<div align="right">
<a href="addAirport.php"><h3>Add new airport</h3></a>
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
$sql = "SELECT * FROM airport";
$resultAirport = mysqli_query($dbc, $sql);
if (mysqli_num_rows($resultAirport) > 0)
                        {                        
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
                        while($row = mysqli_fetch_assoc($resultAirport))
                         {                      
                             ?>
                              <tr>
                                  <?php $_SESSION['airportID'] = $row['id'] ?>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['latitude']; ?>.<?php echo $row['longitude']; ?></td>
                                  <?php 
                                  $resultAirlines = "SELECT airlines.name
                                  FROM airportairlines
                                  LEFT JOIN airport ON airport.id = airportairlines.airportId
                                  LEFT JOIN airlines ON airlines.id = airportairlines.airlinesId
                                  WHERE airport.id = '".$row['id']."'";
                                  $result = mysqli_query($dbc, $resultAirlines);
                                      
                                  ?>
                                  <td><?php if(mysqli_num_rows($result) > 0)
                                  { ?><select name="ID">
                                  <?php
                                                              
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                      echo "<option value=".$row['id'].">".$row['name']."</option>";
                                  }
                                  ?>
                                  </select>
                                  <?php
                                 }
                                 else
                                 {
                                   echo "There are no airlines";
                                 }
                                 ?>
                                </td>
                                  <?php
                                      $sql = "SELECT country.name 
                                      FROM country
                                      LEFT JOIN airport ON airport.countryId = country.id
                                      WHERE airport.id ='".$_SESSION['airportID']."'";
                                      $result = mysqli_query($dbc, $sql);
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
                        }
                         else
                         {
                             ?><h3>There are no airports!</h3><?php
                         }
                         ?>
        </tbody>  
      </table>  
	  </div>
<?php
include_once('includes/footer.php');
?>