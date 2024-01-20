<?php
$con=mysqli_connect("localhost","root","","login_page");
$query="select * from user_data";
$result=mysqli_query($con,$query);

echo "<table class='table'>"; 
while($data = mysqli_fetch_assoc($result)){
echo "<tr><td>" . htmlspecialchars($data['first_name']) . "</td><td>" . htmlspecialchars($data['last_name']) . "</td><td>" . htmlspecialchars($data['email']) . "</td> </tr>";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<style>
    .table ,table td{
        border:2px black solid;
        cell-s
    }
</style>
<body>
    
</body>
</html>