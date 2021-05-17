
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add new state | tailor web</title>
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
$msg="";
include("config.php");
include("includes/functions.php");
session_start();
if(isset($_SESSION['email'])){
?>

 <?php
if(isset($_POST['submit'])){
    $ustate =$_POST['ustate'];
    if(empty($ustate)){
        $msg=  "<div style='color:red;'>Enter the State</div>"; 
    }else{
        mysqli_query($conn,"INSERT INTO state(statename) VALUES ('$ustate')") or die("error");
        $msg="<div style='color: rgb(0, 255, 76);'>State successfully stored</div>";
        header("location:state_admin_display.php");
    }
}
?> 

<?php
}else{
    header("loction:admin_login.php");
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
                    <h3>Add New State</h3>
                </div>
            </div>
        </div>
</section>
<section id="main">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- <div class="table-responsive"> -->
                    <form method="POST">
                        <!-- <div class="row"> -->
                            <div class="form-group text-left col-md-6">
                                <label>State Name:</label>
                                <input class="form-control" type="text" value="" name="ustate">
                                <?php echo $msg;?>
                            </div>
                            <br><br><br><br><br>
                            <div class="form-group text-left col-md-6">
                                <input class="btn btn-primary" type="submit" name="submit" value="submit">
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