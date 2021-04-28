<?php


	$conn = mysqli_connect("localhost", "root", "", "product_details");

	if ($conn === false) {
  		die("Connection failed: " . mysqli_connect_error());
}

	$pname = mysqli_real_escape_string($conn, $_REQUEST['pname']);
	$image = mysqli_real_escape_string($conn, $_REQUEST['image']);
	$price = mysqli_real_escape_string($conn, $_REQUEST['price']);
	
	$query = "INSERT INTO product (pname, image, price) VALUES ('$pname', '$image', '$price')";

	$showall = mysqli_query($conn,"SELECT * FROM product");

	if (mysqli_query($conn, $query)) {
  		echo "<script>alert('Product(s) added to the store catalog successfully.')</script>";
  		header ("Location: dashboard.php");
  		
  		while($row = mysqli_fetch_array($showall))
  		{
  			echo $row['pname'] . $row['image'] . $row['price'];
   		}
} 	else {
  		echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



?>