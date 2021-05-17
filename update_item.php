
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
	background-color:  #6ec46b;
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
	background-color:  #6ad496;
}
#header{
	background-color: #5a5f5f;
	color: #fff;
	padding-bottom: 10px;
	margin-bottom: 15px;
    
}
</style>
</head>

<body>
<?php
$msg="";

include("config.php");
include("includes/functions.php");
session_start();
if(isset($_SESSION['email'])){

?>

<?php
$itemid=$_GET['item'];
if(isset($itemid)){
    $result=mysqli_query($conn,"SELECT itemid, itemname,titemid,basicrate,extradesignrate,image FROM itemname WHERE itemid='$itemid'");
    $retrive=mysqli_fetch_array($result);
    $uitem_id=$retrive['itemid'];
    $uitem_name=$retrive['itemname'];
    $ut_item_id=$retrive['titemid'];
    $uproduct_rate=$retrive['basicrate'];
    $uext_rate=$retrive['extradesignrate'];
    $uimage=$retrive['image'];
}
if(isset($_POST['edit'])){
    $itemid=$_POST['uitem_id'];
    $itemname=$_POST['uitem_name'];
    $titemid=['ut_item_id'];
    $product_rate=$_POST['uproduct_rate'];
    $extra_rate=$_POST['uext_rate'];
    $image=$_POST['image'];

    $sql=mysqli_query($conn,"UPDATE itemname SET itemname='$itemname',basicrate='$product_rate',extradesignrate='$extra_rate',image='$image' WHERE itemid='$itemid'");
    if($sql){
        $msg="<div style='color: greenyellow;'> You Successfully Update data..</div>";
    }else{
        echo "<script>alert('Sorry, not changed value')</script>";
    }
    

}

?>
<?php
}
else{
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
                        <li><a href="state_admin.php">Add New State</a></li>
                        <li><a href="city_admin_display.php">Show City</a></li>
                            <li><a href="state_admin_display.php">Show State</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logout</a><li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h3>Task Assign Update</h3>
                </div>
            </div>
        </div>
</section>
<section id="main">
    <div class="container">
    <a href="add_new_item_display.php"> <button class="btn btn-outline-danger" style="background-color:rgba(0, 0, 255, 0.103); color: blue; border: 1px solid blue; margin-bottom: 12px;">Back</button></a>
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- <div class="table-responsive"> -->
                    <form method="POST">
                        <div class="form-group text-left col-md-6">
                            <label>Item id</label>
                            <input type="text" class="form-control" value="<?php echo $uitem_id?>" name="uitem_id" readonly>
                        </div>
                        <div class="form-group text-left col-md-6">
                            <label>Item Name</label>
                            <input type="text" class="form-control" value="<?php echo $uitem_name ?>" name="uitem_name">
                        </div>
                        <div class="form-group text-left col-md-6">
                            <label>Tailor Item id</label>
                            <input type="text" class="form-control" value="<?php echo $ut_item_id?>" name="ut_item_id" >
                        </div>
                        <div class="form-group text-left col-md-6">
                            <label>Product rate</label>
                            <input type="text" class="form-control" value="<?php echo $uproduct_rate ?>" name="uproduct_rate">
                        </div>
                        <div class="form-group text-left col-md-6">
                            <label>Extra Design Rate</label>
                            <input type="text" class="form-control" value="<?php echo $uext_rate ?>" name="uext_rate">
                        </div>
                        <div class="form-group text-control col-md-6">
                            <label>Image:</label>
                            <img src="upload/<?php echo $uimage?>" width="120" height="120">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="submit" class="btn btn-primary"  name="edit" value="submit">
                        </div>
                    </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

</body>

</html>