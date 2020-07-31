<?php 
	session_start();

	$sp = 0;
	if(isset($_SESSION['cart']) && $_SESSION['cart'] != NULL){
		foreach ($_SESSION['cart'] as $value) {
			if (isset($value['slg'])){
				$sp += $value['slg'];
			}
		}
		echo "có $sp sản phẩm trong giỏ hàng, xem ngay nào <a href='viewCart.php'>ViewCart</a>";
	} else {
		echo '0 có sản phẩm nào trong giỏ hàng';
	}
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<title>List Products</title>
	<link rel="stylesheet" href="">
	<style>
		tr, th, td {
			border: 1px solid black;
			padding: 5px;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Hình ảnh</th>
			<th>Giá</th>
			<th>Kho còn</th>
			<th>Thêm vào giỏ</th>
		</tr>

<?php 
	// Create connection
	$conn = new mysqli("localhost", "root", "", "phpshoppingcart");

	$sql = "SELECT * FROM products";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	$stt = 1;
	  while($row = mysqli_fetch_assoc($result)) {
	    echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td><img src="."uploads/".$row['image']." width='20%'></td>";
		echo "<td>".$row['price']."00đ</td>";
		echo "<td>".$row['instock']."</td>";
		echo "<td><a href='cart.php?id=".$row['id']."' class='btn btn-danger'>Thêm vào giỏ</a></td>";
		echo "</tr>";
		$stt++;
	  }
	} else {
	  echo "0 results";
	}	
?>
	</table>
</body>
</html>