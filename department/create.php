<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if (isset($_POST['adddep'])){
    $depname=$_POST['depname'];
    $adddepartment="INSERT INTO department values(null,'$depname')";
    mysqli_query($connection,$adddepartment);
}
?>

<form method="post">
    <div class="form-group">
        <label>Department Name</label>
        <input type="text" name="depname">
    </div>
    <button name="adddep" type="submit" class="btn btn-primary">Insert Department</button>
</form>
<?php
include '../shared/footer.php';
?>