<?php
/*      CSC226 FINAL PROJECT, Prof. Minh Doan
 *      Spring 2020 
 *      
 *      SHOPPING CART USER INTERFACE
 *      @Author Travis Trotto, Michele,Esmond
 *      
 *      # ACCESS'S "Product_details" TABLE IN myphpadmin DATABASE
 *
*/
    session_start();
    $database_name = "Product_details";
    $connect = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("That product is already in your cart, remove it to change or edit the quantity")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product removed from cart successfully")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>K-Daysi Shopping Cart</title>

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
        <h1>Order Successfully Processed!</h1>
        <?php
        $total = 0;
            foreach ($_SESSION["cart"] as $key => $value)
            {
                $total = $total + ($value["item_quantity"] * $value["product_price"]);
            }
            unset($_SESSION["cart"]);
    
            




 if(isset($_SESSION['username']) != ''){
       

        $conn = mysqli_connect("localhost", "root", "", "product_details");

    if ($conn === false) {
        die("Connection failed: " . mysqli_connect_error());
}

    $cust = mysqli_real_escape_string($conn, $_POST['custName']);
    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);

    $query = "INSERT INTO orders (accountName, custName, address, city, state, zip, orderTotal) VALUES ('$username', '$cust', '$add', '$city', '$state', '$zip', '$total')";
    if (mysqli_query($conn, $query)) {
          echo "<b><center>Thank you for your purchase, " . $_POST["custName"] . "!<br>";
        echo "Your order details have been saved under your account " . $_SESSION['username'] . ".<br>The total of your order purchase was $" . $total . ".<br><br></b>"; 
        
}   else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
        }
        else
        {
            $conn = mysqli_connect("localhost", "root", "", "product_details");

    if ($conn === false) {
        die("Connection failed: " . mysqli_connect_error());
}

    $cust = mysqli_real_escape_string($conn, $_POST['custName']);
    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $username = "GUEST";

    $query = "INSERT INTO orders (accountName, custName, address, city, state, zip, orderTotal) VALUES ('$username', '$cust', '$add', '$city', '$state', '$zip', '$total')";


    if (mysqli_query($conn, $query)) {
         echo "<b><center>Thank you for your purchase, " . $cust . "!<br>";
        echo "The total of your order purchase was $" . $total . ".</center><br><br></b>";
        
}   else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
            
            }
          ?>
            <a href="index.php">
                    <br><center>
                    <button style="width: 150px;" class="btn">
                    Shop Again
                    </button>
                    </center>
                </a>          
            </div>
            <br>
        
         
    </div>
        </div>
<font style="font-family: calibri; font-size: 16px; color: black;"><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Designed and Programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
    </div>
    



</body>
<footer style="text-align: center;">
     <?php 
date_default_timezone_set('America/New_York');
echo "Current New_York Time: ".date('m/d/Y h:i:sa');
?>
</footer>
</html>