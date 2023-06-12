<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';

$listall="SELECT * from department";
$getlist=mysqli_query($connection,$listall);
if(isset($_GET['delete'])){
    $ID=$_GET['delete'];
    $delete="DELETE FROM department WHERE deid='$ID'";
    $deletedata=mysqli_query($connection,$delete);
    header("location:./list.php");
}
?>

 <table class="table ">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php foreach ($getlist as $d) {?>
        <tbody>
            <td> <?php echo $d['deid'];  ?> </td>
            <td> <?php echo $d['dename'];?> </td>
            <form>
                <td> <a href="./list.php?delete=<?php echo "$d[deid]" ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </form>
            <?php }?>
        </tbody>
    </table>
<?php
include '../shared/footer.php';
?>