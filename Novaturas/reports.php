<?php
include_once('includes/header.php');
include_once('includes/database.php');
?>
<div class="container">
<a href="reportCountriesWithoutAirlines.php"><h3>Airports without airlines</h3></a>
<a href="reportCountriesWithoutBoth.php"><h3>Airports without airports and airlines</h3></a>
</div>
<div class="container">
<h3>Airports to which only the airlines of the selected country fly</h3>
<h4>Choose one of the countries</h4>
<?php
$sql = "SELECT * FROM country";
$result = mysqli_query($dbc, $sql);
if (mysqli_num_rows($result) > 0)
                        {                        
                            ?>
<form action="reportSelectedAirlines.php" method="post">
<select name="ID">
                                  <?php
                                                              
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                      echo "<option value=".$row['id'].">".$row['name']."</option>";
                                  }
                                  ?>
                                  </select>
    <input type="submit" value="Show">         
</form>
<?php 
}
    else
    {
        echo "There is nothing to choose, add countries first!";
    }
?>

</div>
<?php
include_once('includes/footer.php');
?>