<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>List Products</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
			<th>Số lượng</th>
			<th>Thành tiền</th>
			<th>Xóa</th>
		</tr>
		<?php 
			session_start();
			$sp = 0;
			$stt = 1;
			$thanhtien = 0;
			if (isset($_SESSION['cart']) && $_SESSION['cart'] != NULL){
				foreach ($_SESSION['cart'] as $key=>$value) {
					if( (isset($value['slg'])) && $value['slg'] >0){
						$sp += $value['slg'];
						echo "<form action='updateCart.php' method='post'>";
							echo "<tr>";
								echo "<td>$stt</td>";
								echo "<td>".$value['name']."</td>";
								echo "<td>"."<img src='uploads/".$value['image']."' width='20%'>"."</td>";
								echo "<td>".$value['price']."</td>";
								echo "<td>"."<input type='number' min='1' name='slg[".$value['id']."]' value='".$value['slg']."' >"."</td>";
								echo "<td>".$value['price']*$value['slg']."</td>";
								echo "<td><a href='deletepro.php?id=".$value['id']."'>Xóa</a></td>";
							echo "</tr>";
						
						$thanhtien += $value['price']*$value['slg'];
					}
					$stt++;
					
				}
				echo "Có $sp sản phẩm ở trong giỏ hàng";
			} else {
				echo "Không có sản phẩm nào trong giỏ";
			}
		 ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><input class="btn btn-info" type="submit" value="Cập nhật lại giỏ hàng"></td>
			<td><?= $thanhtien ?></td>
			<td></td>
		</tr>
		<?php 
			echo "</form>";
		 ?>
	
	</table>
	<br>
	<a href="listproduct.php" class="btn btn-success">Mua Thêm Sản Phẩm Ở Đây</a>
	<a href="payment.php" class="btn btn-dark">Thanh Toán</a>
</body>
</html>