<?php
$con=mysqli_connect("localhost","root","","login_page");
$id=$_GET['id'];
if(isset($id)){
    $select="DELETE FROM user_data WHERE id='".$_GET['id']."'";
    $query=mysqli_query($con,$select);
    header("Location:manage_users_modal.php");
}
?>