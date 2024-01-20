<?php
$con=mysqli_connect("localhost","root","","test");
$select="select * from sub_cat where cat_id='".$_GET["id"]."'";
$query=mysqli_query($con,$select);
while($data=mysqli_fetch_assoc($query)){
    echo "<option value='".$data['id']."'>".$data['subcat_name']."</option>";
}
?>