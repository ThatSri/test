<?php
require("connect_db.php");
$id=$_POST['menu_id'];
$image=$_POST['image'];
$menu=$_POST['n_menu'];
$detail=$_POST['detail'];
$price=$_POST['price'];

$sql = "UPDATE menu SET image='image', name='$n_menu', detail='$detail', price='$price WHERE ID='$menu_id'";
mysqli_query($conn, $sql);

header( "location: back_kfc.php" );
exit(0);
?>