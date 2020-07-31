<?php 
	session_start();
	echo '<pre>';
	// print_r($_POST['slg']);

	foreach ($_POST['slg'] as $key=> $value) {
		$_SESSION['cart'][$key]['slg'] = $value;
	}
	header('Location:viewCart.php');
 ?>