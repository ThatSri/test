<?php
require("connect_db.php");
$id=$_GET['menu_id'];

$sql = "DELETE FROM menu WHERE menu_id='$id'";
mysqli_query($conn, $sql);

header( "location: back_kfc.php" );
exit(0);
?>