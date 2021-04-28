<?php


	$conn = mysqli_connect("localhost", "root", "", "product_details");

	if ($conn === false) {
  		die("Connection failed: " . mysqli_connect_error());
}

	$cust = mysqli_real_escape_string($conn, $_REQUEST['cust']);
	$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
	$orderno = mysqli_real_escape_string($conn, $_REQUEST['orderno']);
	$issue = mysqli_real_escape_string($conn, $_REQUEST['issue']);

	$query = "INSERT INTO help_tickets (cust, email, orderno, issue) VALUES ('$cust', '$email', '$orderno', '$issue')";

	$showall = mysqli_query($conn,"SELECT * FROM help_tickets");

	if (mysqli_query($conn, $query)) {
  		echo '<script>alert("Your help ticket was submitted successfully.")</script>';
  		echo '<script>window.location="index.php"</script>';
  		while($row = mysqli_fetch_array($showall))
  		{
  			echo $row['cust'] . $row['email'] . $row['orderno'] . $row['issue'];
   		}
} 	else {
  		echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



?>