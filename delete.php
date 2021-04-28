<?php

include("auth_session.php");
require('db.php');

$id = $_GET['id'];

$del = mysqli_query($con, "DELETE FROM help_tickets WHERE id = '$id'"); 

if ($del)
{
    header("Location: dashboard.php");
    exit;

} else {
    echo "Error deleting record";
}

?>