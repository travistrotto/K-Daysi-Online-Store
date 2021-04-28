<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>K-Daysi Registration</title>
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
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");

        $checkUsername = "SELECT * FROM accounts WHERE userAccount='$username'";
        $checkEmail = "SELECT * FROM accounts WHERE userEmail='$email'";
        $cu = mysqli_query($con, $checkUsername);
        $ce = mysqli_query($con, $checkEmail);

        if (mysqli_num_rows($cu) > 0) {
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
        <h1 class='login-title'>Account Registration</h1>
        <center>
                  <h3><font style='font-family: calibri; font-size: 18px; color: black;'>The username you submitted is already taken.</font></h3><br/>
                  <p class='link'><font style='font-family: calibri; font-size: 16px; color: black;'>Click here to <a href='registration.php'>register</a> again.</font></p>

                  <font style='font-family: calibri; font-size: 12px; color: black;'><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
                  </div>";  
                  exit();
        }else if(mysqli_num_rows($ce) > 0){
            echo "<div class='container' style='width: 65%''>
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
        <h1 class='login-title'>Account Registration</h1>
        <center>
                  <h3><font style='font-family: calibri; font-size: 18px; color: black;'>The e-mail you submitted already belongs to another account.</font></h3><br/>
                  <p class='link'><font style='font-family: calibri; font-size: 16px; color: black;'>Click here to <a href='registration.php'>register</a> again.</font></p>

                  <font style='font-family: calibri; font-size: 12px; color: black;'><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
                  </div>";   
                  exit(); 
       }else{

        $query    = "INSERT into accounts (userAccount, userPass, userEmail, create_datetime)
                     VALUES ('$username', '$password', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
            

        if ($result) {
            echo "<div class='container' width='65%'>
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
         <h1 class='login-title'>Account Registration</h1>
         <center>
                  <h3><font style='font-family: calibri; font-size: 18px; color: black;'>Account registration successful!</font></h3><br/>
                  <p class='link'><font style='font-family: calibri; font-size: 16px; color: black;'>Click here to <a href='login.php'>Login</a></font></p></center>

                  
                  <font style='font-family: calibri; font-size: 12px; color: black;'><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
                  </div>";


        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
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
    <form class="form" action="" method="post">
        <h1 class="login-title">Account Registration</h1>
        <center>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br><br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress"><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"><br><br>
        <input type="submit" style="background: #bc8bcf; border: 0px; border-radius: 8px; font-size: 13px; font-family: 'calibri'; color: white; width: 100px; padding: 0px 0px; text-align: center;" name="submit" value="Register" class="login-button"><br><br>
        <p class="link"><font style="font-family: calibri; font-size: 14px; color: black;">Already have an account? <a href="login.php">Login here</a></font></p></center>
    </form>

    <font style="font-family: calibri; font-size: 16px; color: black;"><center><br><br><br><br>k-daysi © 2020 | Privacy Policy | Terms of Use | Contact<br>Site designed and programmed by Esmond Chin, Travis Trotto, Michelle Gonzalez - CSC 226</font></center>
<?php
    }
?>
</body>
</html>
