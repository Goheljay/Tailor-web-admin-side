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
$cityid=$_GET['del'];
mysqli_query($conn,"DELETE FROM city WHERE cityid='$cityid'");
header("location:city_admin_display.php");
// echo "Hello";
?>