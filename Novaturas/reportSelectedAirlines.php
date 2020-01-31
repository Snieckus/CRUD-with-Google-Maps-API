<?php
include_once('includes/header.php');
include_once('includes/database.php');
?>
<div class="container">

<?php
$newCountry = $_POST['ID'];

$sql = "SELECT airport.id, airport.name, airport.latitude, airport.longitude, airport.countryId 
FROM airport
LEFT JOIN airportairlines ON airportairlines.airportId = airport.id
LEFT JOIN airlines ON airportairlines.airlinesId = airlines.id
LEFT JOIN country ON country.id = airport.countryId
WHERE airlines.countryId = '".$newCountry."' AND airportairlines.id IS NOT NULL";

$resultCountryWithoutAirlines = mysqli_query($dbc, $sql);
if (mysqli_num_rows($resultCountryWithoutAirlines) > 0)
                        {                        
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
                        while($row = mysqli_fetch_assoc($resultCountryWithoutAirlines))
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