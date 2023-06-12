<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if(isset($_GET['by'])){
if($_GET['by']=='DESC'){
$listallsalary="SELECT * from employees JOIN department ON employees.depid=department.deid ORDER BY salary DESC";
$getlist=mysqli_query($connection,$listallsalary);
}
if($_GET['by']=='ASC'){
$listallsalary="SELECT * from employees JOIN department ON employees.depid=department.deid ORDER BY salary ASC";
$getlist=mysqli_query($connection,$listallsalary);
} } else{
$listall="SELECT * from employees JOIN department ON employees.depid=department.deid ORDER BY employees.empid";
$getlist=mysqli_query($connection,$listall);
if(isset($_GET['delete'])){
    $ID=$_GET['delete'];
    $delete="DELETE FROM employees WHERE empid='$ID'";
    $deletedata=mysqli_query($connection,$delete);
    header("location:./list.php");
}
}
if(isset($_GET['del'])){
    // var_dump($_GET);
    $from=$_GET['from'];
    $to=$_GET['to'];
    $deletemany="DELETE FROM employees WHERE empid BETWEEN $from AND $to";
    mysqli_query($connection,$deletemany);
    header("location:./list.php");
}
?>

<form method="GET">
    <label>from</label>
    <select name="from">
        <?php foreach($getlist as $idfrom){?>
        <option value="<?php echo"$idfrom[empid]" ?>"><?php echo"$idfrom[empid]" ?></option>
        <?php }?>
    </select>
    <label>to</label>
    <select name="to">
        <?php foreach($getlist as $ids){?>
        <option value="<?php echo"$ids[empid]" ?>"><?php echo"$ids[empid]" ?></option>
        <?php }?>
    </select>

    <input type="submit" value="Delete" class="btn btn-danger" name="del">

</form>
<form class="form-inline" action="search.php">
    <input name="employeename" class="form-control mr-sm-2" type="search"
     placeholder="Search by employee name" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
        name="search">Search</button>
</form>

<form method="GET">
    <label>Order by Salary :</label>
    <select name="by">
        <option value="DESC">Largest</option>
        <option value="ASC">Smallest</option>
    </select>

    <input type="submit" value="filter" class="btn btn-info" name="ORDER">

</form>

<table class="table ">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Salary</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php foreach ($getlist as $d) {?>
    <tbody>
        <td> <?php echo $d['empid'];  ?> </td>
        <td> <?php echo $d['empname'];?> </td>
        <td> <?php echo $d['email'];?> </td>
        <td> <?php echo $d['salary'] ;?> </td>
        <td> <?php echo $d['dename'];?> </td>
        <form>
            <td> <a href="update.php?edit=<?php echo $d['empid']?>"
                    class="btn btn-primary btn-sm">Edit</a>
                <a href="list.php?delete=<?php echo $d['empid']?>"
                    class="btn btn-danger btn-sm">Delete</a>
            </td>
        </form>
        <?php }?>
    </tbody>
</table>
<?php
include '../shared/footer.php';
?>