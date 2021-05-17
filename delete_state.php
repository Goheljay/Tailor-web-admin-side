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
$stateid=$_GET['del'];
mysqli_query($conn,"DELETE FROM state WHERE stateid='$stateid'");
header("location:state_admin_display.php");
// echo "Hello";
?>