<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
$getdepartments="SELECT * from department";
$departments=mysqli_query($connection,$getdepartments);
if(isset($_POST['addemp'])){
    $empname=$_POST['empname'];
    $empemail=$_POST['empemail'];
    $emppassword=$_POST['emppassword'];
    $empsalary=$_POST['empsalary'];
    $depofemp=$_POST['depofemp'];
    $insert="INSERT into employees values(null,'$empname','$empemail','$emppassword','$empsalary','$depofemp')";
    $insertInto=mysqli_query($connection,$insert);
}
?>
 <form class="form" method="post">
        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="empname" class="form-control">
        </div>
        <div class="form-group">
            <label>Employee Salary</label>
            <input type="text" name="empsalary" class="form-control">
        </div>
        <div class="form-group">
            <label>Employee Email</label>
            <input type="email" name="empemail" class="form-control">
        </div>
        <div class="form-group">
            <label>Employee Password</label>
            <input type="password" name="emppassword" class="form-control">
        </div>
        <div class="form-group">
            <label>Department</label>
            <select name="depofemp" >
                <?php foreach($departments as $options){?>
                <option value="<?php echo"$options[deid]" ?>"><?php echo"$options[dename]" ?></option>
                    <?php } ?>
            </select>
        </div>
        <button name="addemp" type="submit" class="btn btn-primary">Insert Employee</button>
    </form>

<?php
include '../shared/footer.php';
?>