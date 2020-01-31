<?php
include_once('includes/header.php');
include_once('includes/database.php');
?>
<div class="container">
    <h3>Add new airlines</h3>
    <table id="myTable" class="table table-striped table-bordered" >
        <tr>
            <td>
            <form action="addNewAirlinesFinal.php" method="POST">
                Name:<br>
                <input type="text" name="name" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required><br><br>
                Country:<br>
                <select name="ID">
                                <?php
                                $resultCountry = "SELECT * FROM country";
                                $result = mysqli_query($dbc, $resultCountry);                              
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                }
                                ?>
                                </select>
                                <br><br>
                <input type="submit" value="Submit">       
            </form> 
            </td>
        </tr>
    </table>  
</div>
<?php
include_once('includes/footer.php'); ?>
