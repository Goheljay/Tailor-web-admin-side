<?php
include("config.php");
include("includes/functions.php");
session_start();
 if(isset($_SESSION['email'])){
?>


<?php
}else{
    header("loaction:admin_login.php");
}
?>

<?php

include("config.php");

// session_start();

$taskid=$_GET['del'];
mysqli_query($conn,"DELETE FROM taskassign WHERE taskid='$taskid'");
header("location:task_assign.php");
?>
