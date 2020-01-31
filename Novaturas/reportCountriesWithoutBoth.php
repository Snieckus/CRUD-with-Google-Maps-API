<?php
include_once('includes/header.php');
include_once('includes/database.php');
?>
<div class="container">
<?php
$sql = "SELECT country.name, country.iso FROM country
LEFT JOIN airlines ON airlines.countryId = country.id
LEFT JOIN airport ON airport.countryId = country.id
WHERE airport.id IS NULL AND airlines.id IS NULL";


$resultCountryWithoutAirlines = mysqli_query($dbc, $sql);
if (mysqli_num_rows($resultCountryWithoutAirlines) > 0)
                        {                        
                            ?>
                            <h3>Countries without airports and airlines</h3>
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
                        while($row = mysqli_fetch_assoc($resultCountryWithoutAirlines))
                         {
                             ?>
                              <tr>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['iso']; ?></td>
                            </tr>
                            <?php                         
                         }
                        }
                         else
                         {
                             ?><h3>There are no countries without airlines!</h3><?php
                         }
                         ?>
        </tbody>  
      </table> 
      </div>
      <?php
include_once('includes/footer.php');
?>