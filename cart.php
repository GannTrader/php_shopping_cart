<?php 

	//khởi tạo session
	session_start();

	$id = $_GET['id'];

	//lấy sp ra và xử lý lại cái mảng sao cho key phải trùng với id mới làm tiếp được
	// Create connection
	$conn = new mysqli("localhost", "root", "", "phpshoppingcart");

	$sql = "SELECT * FROM products";
	$result = mysqli_query($conn, $sql);
	// $newpro = array();

	if (mysqli_num_rows($result) > 0) {
	  while($row = mysqli_fetch_assoc($result)) {
	  		echo '<pre>';
	  		$newpro[$row['id']] = $row;
	  		
	  }
	} else {
	  echo "0 results";
	}	
	
	// session_destroy();
	//công đoạn thêm vào giỏ hàng
	//Nếu chưa có giỏ hàng-> tạo mới và thêm sp; 
	// Nếu có rồi-> nếu có sp thì tăng số lượng, nếu chưa thì thêm vào
	if(!isset($_SESSION['cart']) || $_SESSION['cart'] == NULL){
		$newpro[$id]['slg'] = 1;
		$_SESSION['cart'] = $newpro;
		echo 'không có gì trong giỏ cả';
	} else {
		if (isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['slg'] += 1;
		} else {
			$newpro[$id]['slg'] = 1;
			$_SESSION['cart'] = $newpro;
		}
	}

	header('Location: listproduct.php');
 ?>

