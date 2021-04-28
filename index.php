<?php


/*      CSC226 FINAL PROJECT, Prof. Minh Doan
 *      Spring 2020 
 *      
 *      LANDING PAGE: LISTS PRODUCTS
 *      @Author Travis Trotto, Esmond Chin,  Michelle Gonzalez,
 *      
 *      # ACCESS'S "product_details" TABLE IN myphpadmin DATABASE
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
                echo '<script>window.location="Cart3.php"</script>';
            }else{
                echo '<script>alert("This product is already in your shopping cart.")</script>';
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
                    echo '<script>alert("This item was removed from your shopping cart.")</script>';
                    echo '<script>window.location="Cart3.php"</script>';
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
    <title>Shop K-Daysi</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
           
        }
        .product{
            border: 1px solid #efefef;
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
            background-color: black;
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
            background-color: black;
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
        <h1>SUMMER PREVIEW - Up to 30% off!</h1>
        <?php
            $query = "SELECT * FROM product ORDER BY id ASC ";
            $result = mysqli_query($connect,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger"><?php echo "$" . $row["price"]; ?></h5>
                                <input type="text" width="100" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background: #bd8cbf; border: 0px; font-family: calibri; font-size: 12px" class="btn btn-success"
                                       value="Add to Cart">
                            

                            </div>
                            
                        </form>
                            

                    </div>
                            

                    <?php
                }
            }
        ?>

    
                            
            
    


    <!--
    <div class="sCart">
        <h3 class="title2">Your Shopping Cart</h3>
        <p style="text-align: center;"><strong>These are the products listed in your shopping cart.</strong></p>
         <p style="text-align: center;">Each product you see listed below is selected by you from the above products.<br>A PHP file keeps track of your "purchases" and lists the items and totals in the table below.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="index.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
-->


    </div>

<font style="font-family: calibri; font-size: 16px; color: black;"><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Designed and Programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>

<?php 
date_default_timezone_set('America/New_York');
echo "Current New_York Time: ".date('m/d/Y h:i:sa');
?>


</body>
</html>