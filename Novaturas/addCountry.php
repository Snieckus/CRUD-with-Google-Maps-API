<?php
include_once 'includes/header.php';
include_once 'includes/database.php';
include_once 'sql.php';
?>
<div class="container">
    <h3>Add new country</h3>
    <table id="myTable" class="table table-striped table-bordered" >
        <tr>
            <td>
            <form action="addNewCountryFinal.php" method="POST">
                Name:<br>
                <input type="text" name="name" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required><br><br>
                Country code(ISO):<br>
                <input type="text" name="iso" pattern="[A-Z]{2}/[A-Z]{3}" oninvalid="setCustomValidity('Please enter format [aa/aaa]')" required><br><br>
                <input type="submit" value="Submit">
            </form>
            </td>
        </tr>
    </table>
</div>
<?php include_once 'includes/footer.php';?>
