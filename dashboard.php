<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require('db.php');

/*
$adminUser = 'admin';

if(isset($_SESSION['$adminUser']) != 'admin'){
        header("Location: adminlogin.php"); 
        exit();
        }
        else
        {
            header("Location: dashboard.php");
            exit();
        }
*/
/*
        if(!isset($_REQUEST['username'])||!isset($_REQUEST['password'])){
	//ILLEGAL ACCESS: if you try to access DIRECTLY
	header("Location: adminlogin.php");*/
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>K-Daysi Admin Dashboard</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
           
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: lightgray;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: white;
            background-color: purple;
            padding: 2%;
        }
        input{
            font-family: calibri;
            text-align: center;
        }
        button{
            background-color: #bd8cbf;
            border: 0px solid #ffffff;
            border-radius: 8px;
            webkit-appearance: none;
            font-size: 13px;
            font-family: 'calibri';
            color: white;
            width: 100px;
            padding: 0px 0px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition-duration: 0.4s;
        }
        button:hover{
            background-color: #000000;
            color: white;
        }
        h1{
            text-align: left;
            font-size: 20px;
            font-family: calibri;
            font-weight: bold;
            color: white;
            background-image: linear-gradient(to bottom right, black, white);
            padding: 1%;
        }
        h2{
            text-align: right;
            color: black;
            font-family: calibri;
            font-size: 14px;
            background-color: white;
            padding: 0%;
        }
        table th{
            background-color: lightgray;
            font-family: calibri;
            font-size: 14px;
        }
    </style>
</head>
<body>



<div class="container" style="width: 65%">
        <table width=100%><tr><td align="left" valign="middle">
        <a href="index.php"><img src="logo.jpg"></a>
        </td>
            <td align="right" valign="top">
            <div class="accounts"><br>
                <a href="login.php">
                    <button>Account Login</button></a>
                <a href="registration.php">
                    <button height="50">
                        Create Account
                    </button></a>
                <a href="helptickets.html">
                    <button>
                        Support
                    </button></a>
                <a href="adminlogin.php">
                    <button>
                        Admin Login
                    </button></a>
            
                <a href="Cart3.php">
                    <button>
                    Shopping Cart
                    </button></a><br><br>
                <img src="banner.jpg" height="50%" width="50%">
            </div>
        </td></tr></table>
 
<h2><?php 
        if(isset($_SESSION['username']) != ''){
        echo "<i>You are logged in as " . $_SESSION['username'] . "</i>" . "<br><a href='logout.php'>Logout</a>"; 
        }
        else
        {
            echo "<i>You are shopping as a guest. Please login or register for an account for member only specials!</i>";
        }
        ?></h2>

        <h1 class="login-title">Admin Dashboard</h1>




<?php



$ticketsQuery = "SELECT * FROM help_tickets";
$result = mysqli_query($con, $ticketsQuery) or die(mysql_error());
		
		echo "<i><font style='font-family: calibri; font-size: 20px; font-weight: bold; color: red;'>PENDING CUSTOMER SUPPORT TICKETS<br></font></i>";
		echo "<table border=1>
		<tr>
		<th>Ticket #</th>
		<th>Customer Username</th>
		<th>E-mail</th>
		<th>Order #</th>
		<th>Issue</th>
		<th>Action</th>
		</tr>";
	
  		while($rows = mysqli_fetch_array($result))
  		{
  			echo "<tr>";
  			echo "<td>" . $rows['id'] . "</td>";
  			echo "<td>" . $rows['cust'] . "</td>";
  			echo "<td>" . $rows['email'] . "</td>";
  			echo "<td>" . $rows['orderno'] . "</td>";
  			echo "<td>" . $rows['issue'] . "</td>";
  			echo "<td><a onClick=\"javascript: return confirm('Are you sure?');\" href='delete.php?id=".$rows['id']."'><button>Resolved/Remove</button></a></td>";
  			echo "</tr>";
   		}
   		echo "</table>";
	
$custQuery = "SELECT * FROM accounts";
$result1 = mysqli_query($con, $custQuery) or die(mysql_error());
	echo "<br><br><i><font style='font-family: calibri; font-size: 20px; font-weight: bold; color: red;'>CUSTOMER REGISTRATION LIST<br></font></i>";
	echo "<table border=1>
		<tr>
		<th>Customer ID</th>
		<th>Username</th>
		<th>E-mail</th>
		<th>Date/Time Registered</th>
		<th>Action</th>
		</tr>";
	
  		while($rows = mysqli_fetch_array($result1))
  		{
  			echo "<tr>";
  			echo "<td>" . $rows['userid'] . "</td>";
  			echo "<td>" . $rows['userAccount'] . "</td>";
  			echo "<td>" . $rows['userEmail'] . "</td>";
  			echo "<td>" . $rows['create_datetime'] . "</td>";
  			echo "<td><a onClick=\"javascript: return confirm('Are you sure?');\" href='deleteuser.php?id=".$rows['userid']."'><button>Delete Customer</button></a></td>";
  			echo "</tr>";
   		}
   		echo "</table>";

$productQuery = "SELECT * FROM product";
$result2 = mysqli_query($con, $productQuery) or die(mysql_error());
	echo "<br><br><i><font style='font-family: calibri; font-size: 20px; font-weight: bold; color: red;'>CATALOG OF PRODUCTS<br></font></i>";
	echo "<table border=1>
		<tr>
		<th>Product ID</th>
		<th>Product Name</th>
		<th>Image</th>
		<th>Price</th>
		<th>Action</th>
		</tr>";
	
  		while($rows = mysqli_fetch_array($result2))
  		{
  			echo "<tr>";
  			echo "<td>" . $rows['id'] . "</td>";
  			echo "<td>" . $rows['pname'] . "</td>";
  			echo "<td><img src=".$rows['image']." width='10%' height='10%'></td>";
  			echo "<td>$" . $rows['price'] . "</td>";
  			echo "<td><a onClick=\"javascript: return confirm('Are you sure?');\" href='deleteproduct.php?id=".$rows['id']."'><button>Delete Product</button></a></td>";
  			echo "</tr>";
   		}
   		echo "</table>";


echo "<form action='addproducts.php' method='POST'>";
	echo "<br><br><i><font style='font-family: calibri; font-size: 20px; font-weight: bold; color: red;'>ADD PRODUCT TO CATALOG<br></font></i>";
	echo "<table border=1>
		<tr>
		<th>Product Name</th>
		<th>Image</th>
		<th>Price</th>
		<th>Action</th>
		</tr>";
	
	
  			echo "<tr>";
  			echo "<td><input name='pname' type='text' style='resize: none; width: 200px; height: 25px; font-family: calibri;'></td>";
  			echo "<td><input name='image' style='resize: none; width: 200px; height: 25px; font-family: calibri; font-style: italic;' placeholder='/imagepath/filename.jpg'></td>";
  			echo "<td><input name='price' style='resize: none; width: 200px; height: 25px; font-family: calibri;'></td>";
  			echo "<td><input type='submit' style='background: #bc8bcf; border: 0px; border-radius: 8px; font-size: 13px; font-family: 'calibri'; color: white; width: 100px; padding: 0px 0px; text-align: center;' name='submit' value='Add'></td>";
  			echo "</tr>";
	
   		echo "</table>";
echo "</form>";
?>

  <font style="font-family: calibri; font-size: 12px; color: black;"><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>

</body>
</html>