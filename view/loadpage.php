<!-- FIELD DEPENDENCE -->
<?php 
    $conn=mysqli_connect('localhost','root','','eventphp');
    //var_dump($id=$_POST['country_id']);
    $id=$_POST['country_id'];
    $query="SELECT *from state where country_id='".$id."' ORDER BY sname ASC";

    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['sname'];?></option>
<?php } ?>
<?php 
    //var_dump($id=$_POST['st_id']);
    $id=$_POST['st_id'];
    $query="SELECT *from city where st_id='".$id."' ORDER BY city ASC";

    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['city'];?></option>
<?php } ?>

