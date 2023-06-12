<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if(isset($_GET['edit'])){
    $ID=$_GET['edit'];
    $getdepartments="SELECT * from department";
    $departments=mysqli_query($connection,$getdepartments);
    $listemp="SELECT * from employees JOIN department ON employees.depid=department.deid where empid='$ID'";
    $getemp=mysqli_query($connection,$listemp);
    $employee=mysqli_fetch_assoc($getemp);
    if(isset($_POST['update'])){
        $empname=$_POST['empname'];
        $empemail=$_POST['empemail'];
        $emppassword=$_POST['emppassword'];
        $empsalary=$_POST['empsalary'];
        $depofemp=$_POST['depofemp'];
        $updateddata="UPDATE employees SET empname='$empname',email='$empemail',passwordd='$emppassword',salary='$empsalary',depid='$depofemp' WHERE empid='$ID'";
        mysqli_query($connection,$updateddata);
        header("location:./list.php");
    }
}
?>
<form class="form" method="post">
    <?php  ?>
    <div class="form-group">
        <label>Employee Name</label>
        <input type="text" name="empname" value="<?php echo "$employee[empname]" ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Employee Salary</label>
        <input type="text" name="empsalary" value="<?php echo "$employee[salary]" ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Employee Email</label>
        <input type="email" name="empemail" value="<?php echo "$employee[email]" ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Employee Password</label>
        <input type="password" name="emppassword" value="<?php echo "$employee[passwordd]" ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Current Deparment</label>
        <option><?php echo "$employee[dename]" ?></option>
        <label>Department</label>
        <select name="depofemp">
            <?php foreach($departments as $options){?>
            <option value="<?php echo"$options[deid]" ?>"><?php echo"$options[dename]" ?></option>
            <?php } ?>
        </select>
    </div>
    <button name="update" type="submit" class="btn btn-info">Update Employee</button>
</form>

<?php
include '../shared/footer.php';
?>