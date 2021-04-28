<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>K-Daysi Account Login</title>

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
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM accounts WHERE userAccount='$username'
                     AND userPass='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='container' style='width: 65%'>
            <table width=100%><tr><td align='left' valign='middle'>
        <a href='index.php'><img src='logo.jpg'></a>
        </td>
            <td align='right' valign='top'>
            <div class='accounts'><br>
                <a href='login.php'>
                    <button>Account Login</button></a>
                <a href='registration.php'>
                    <button height='50'>
                        Create Account
                    </button></a>
                <a href='helptickets.html'>
                    <button>
                        Support
                    </button></a>
                <a href='adminlogin.php'>
                    <button>
                        Admin Login
                    </button></a>
            
                <a href='Cart3.php'>
                    <button>
                    Shopping Cart
                    </button></a><br><br>
                <img src='banner.jpg' height='50%'' width='50%''>
            </div>
        </td></tr></table>
    <form class='form' method='post' name='login'>
        <h1 class='login-title'>Customer Login</h1>
        <center>
                  <h3><font style='font-family: calibri; font-size: 18px; color: black;'>Incorrect username or password.</font></h3><br/>
                  <p class='link'><font style='font-family: calibri; font-size: 16px; color: black;'>Click here to <a href='login.php'>Login</a> again.</font></p></center>

                  <font style='font-family: calibri; font-size: 12px; color: black;'><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
                  </div>";
        }
    } else {
?>

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
    <form class="form" method="post" name="login">
        <h1 class="login-title">Customer Login</h1>
        <center>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"/><br><br>
        <input type="submit" style="background: #bc8bcf; border: 0px; border-radius: 8px; font-size: 13px; font-family: 'calibri'; color: white; width: 100px; padding: 0px 0px; text-align: center;" value="Login" name="submit" class="login-button"/><br><br>
        <p class="link"><font style="font-family: calibri; font-size: 14px; color: black;">Don't have an account? <a href="registration.php">Register here</a></font></p>
  </form>

  <font style="font-family: calibri; font-size: 12px; color: black;"><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
<?php
    }
?>
</body>
</html>
