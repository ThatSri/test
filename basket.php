<?php
include('header.php');
include('body_user.php');
?>


<?php
session_start();

$p_id = $_GET['id'];
$act = $_GET['act'];

if ($act == 'add' && !empty($p_id)) {
	if (isset($_SESSION['cart'][$p_id])) {
		$_SESSION['cart'][$p_id]++;
	} else {
		$_SESSION['cart'][$p_id] = 1;
	}
}

if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
	unset($_SESSION['cart'][$p_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['cart'][$p_id] = $amount;
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shopping Cart</title>
</head>

<body>
	<form id="frmcart" name="frmcart" method="post" action="?act=update">
		<table class="table table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">รูป</th>
					<th scope="col">สินค้า</th>
					<th scope="col">ราคา</th>
					<th scope="col">จำนวน</th>
					<th scope="col">รวม(บาท)</th>
					<th scope="col">ลบ</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
			</tbody>
			<?php
			$total = 0;
			if (!empty($_SESSION['cart'])) {
				include("connect_db.php");
				foreach ($_SESSION['cart'] as $id => $qty) {
					$sql = "SELECT * FORM order where p_id=$id";
					$query = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($query);
					$sum = $row['p_price'] * $qty;
					$total += $sum;
					echo "<tr>";
					echo "<td width='300'>" . $row["image"] . "</td>";
					echo "<td width='334'>" . $row["n_menu"] . "</td>";
					echo "<td width='46' align='right'>" . number_format($row["price"], 2) . "</td>";
					echo "<td width='57' align='right'>";
					echo "<input type='text' name='amount[$id]' value='$qty' size='2'/></td>";
					echo "<td width='93' align='right'>" . number_format($sum, 2) . "</td>";
					//remove product
					echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
					echo "</tr>";
				}
				echo "<tr>";
				echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
				echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
				echo "<td align='left' bgcolor='#CEE7FF'></td>";
				echo "</tr>";
			}
			?>
			<tr>
				<td><a href="product.php">กลับหน้ารายการสินค้า</a></td>
				<td colspan="4" align="right">
					<input type="submit" name="button" id="button" value="คำนวณเงินใหม่" />
					<input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
				</td>
			</tr>
		</table>
	</form>
</body>

</html>