<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Upload Products</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<p><input type="text" name="name"></p>
		<p><input type="file" name="image"></p>
		<p><input type="text" name="price"></p>
		<p><input type="number" name="instock"></p>
		<input type="submit" name="ok">
	</form>
</body>
</html>

<?php 
	// Create connection
	$conn = new mysqli("localhost", "root", "", "phpshoppingcart");

	//Khai báo đường dẫn up ảnh
	$target_file = "uploads/" . basename($_FILES["image"]["name"]);

	if(isset($_POST['ok'])){
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		$image = basename( $_FILES["image"]["name"]);

		//Get other data from Form
		$name = $_POST['name'];
		$price = $_POST['price'];
		$instock = $_POST['instock'];

		if ($name !=NULL && $image !=NULL && $price !=NULL && $instock !=NULL){
			$sql = "INSERT INTO products (name, image, price, instock) VALUES ('$name', '$image', '$price', '$instock')";

			if (mysqli_query($conn, $sql)) {
			  echo "New record created successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	}

	

	//close connection
	$conn->close();