
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Item | tailor web</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <style>
        
body{
	/* font-family: 'Times New Roman', Times, serif; */
	outline: none;
	background-color: rgb(255, 255, 209);
	background-size: cover;
	background-repeat: no-repeat;
}
.navbar-inverse {
	background-color: #333333;
	border-color: transparent;
	margin-bottom: 0px;
}
.navbar-inverse .navbar-brand{ 
	color: #ffffff;
	font-size: 15px;
	margin-right: 40px;
}
#myNavbar .navbar-nav li a{
	color: #fff;
	font-size: 15px;
}
#myNavbar #course{
	transition: all 0.3s ease-in-out;
}

#myNavbar #course:hover{
	background-color: #6ec46b;
}
.dropdown-menu{
	display: none;
	position: absolute;
	background-color: #f0f0f0;
	box-shadow: 5px 8px 16px 0px rgba(0, 0, 0, 0.3);
	z-index: 1;
}

.dropdown-menu a{
	color: #000  !important;
	font-size: 16px !important;
}
.dropdown:hover .dropdown-menu{
	display: block;
	transition: all 0.6s ease-in-out;
}

.dropdown .dropdown-menu a:hover{
	background-color: #6ad496;
}
#header{
	background-color: #5a5f5f;
	color: #fff;
	padding-bottom: 10px;
	margin-bottom: 15px;
}
.error{
    color:"red";
}
</style>
</head>

<body>


<?php


include("config.php");
include("includes/functions.php");
session_start();
if(isset($_SESSION['email'])){
?>

<?php

$msg=""; $msg1=""; $msg2=""; $msg3=""; $msg4="";


if(isset($_POST['edit'])){
    $item_name=$_POST['item_name'];
    $titem_id=$_POST['titem_id'];
    $basic_rate=$_POST['basic_rate'];
    $ext_rate=$_POST['ext_rate'];
    $img=$_FILES['image']['name'];
    $tmp_img=$_FILES['image']['tmp_name'];
    $size_image=$_FILES['image']['size'];

    if (empty($item_name)) {
        $msg="<div class='error' style='color:red;'> Enter the Item  Name</div>";
    }elseif (empty($titem_id)) {
        $msg1="<div class='error'> Enter the Tailor Item id</div>";
    }elseif (empty($basic_rate)) {
        $msg2="<div class='error'> Enter The Rate of Clothes</div>";
    }elseif ($img=="") {
        $msg3="<div class='error'> Upload Image </div>";
    }elseif ($size_image>= 1000000) {
        # code...
        $msg3="<div class='error'>Please upload Image less then 1 MB</div>";
    }else {
        move_uploaded_file($tmp_img,"upload/$img");
        mysqli_query($conn,"INSERT INTO itemname(itemname,titemid,basicrate,extradesignrate,image) VALUES ('$item_name','$titem_id','$basic_rate','$ext_rate','$img')");

    }
}


?>

<?php
}else{
    header("location:admin_login.php");
}

?>
    <nav class="navbar navbar-inverse">
        <div class=" container container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_panel.php">Tailor Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-back"><a href="task_assign.php">Task Assign</a></li>
                    <li id="course" class="dropdown"><a href="#">Item Master<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="add_new_item.php">Add new Item</a></li>
                            <li><a href="add_new_item_display.php">Avalible Item</a></li>
                        </ul>
                    </li>
                    <li id="course" class="dropdown"><a href="#">City & State Master<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="city_admin.php">Add New City</a></li>
                            <li><a href="state_admin.php">Add new State</a></li>
                            <li><a href="city_admin_display.php">Show City</a></li>
                            <li><a href="state_admin_display.php">Show State</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout_admin.php">Logout</a><li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2>Add new Item</h2>
                </div>
            </div>
        </div>
</section>
<section id="main">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- <div class="table-responsive"> -->
                    <form method="POST" enctype="multipart/form-data">
                        <!-- <div class="row"> -->
                            <div class="form-group text-left col-md-6">
                                <label>Item Name:</label>
                                <input class="form-control" type="text" value="" name="item_name" >
                                <?php echo $msg;?>
                            </div>
                            <div class="form-group text-left col-md-6">
                                <label>Tailor Item id:</label>
                                <input class="form-control" type="text" value="" name="titem_id">
                                <?php echo $msg1?>
                            </div>
                            <div class="form-group text-left col-md-6">
                                <label>Basic Rate:</label>
                                <input class="form-control" type="text" value="" name="basic_rate" >
                                <?php echo $msg2?>
                            </div>
                            <div class="form-group text-left col-md-6">
                                <label>Extra design Rate:</label>
                                <input class="form-control" type="text" value="" name="ext_rate">
                            </div>
                            <div class="form-group text-left col-md-6">
                                <label>Image:</label>
                                <input style="cursor:pointer;" type="file" value="" name="image">
                                <?php echo $msg3?>
                            </div>
                            <div class="form-group text-left col-md-6">
                                <input class="btn btn-primary" type="submit" name="edit" value="submit">
                                
                            </div>
                        <!-- </div> -->
                    </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

</body>

</html>