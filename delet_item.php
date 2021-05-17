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
$itemid=$_GET['del'];
mysqli_query($conn,"DELETE FROM itemname WHERE itemid='$itemid'");
header("location:add_new_item_display.php");
// echo "Hello";
?>