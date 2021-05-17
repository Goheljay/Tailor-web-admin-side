<?php

include("config.php");
include("includes/functions.php");
session_start();

$msg=""; $msg1=""; $femail="";

if(isset($_POST['submit'])){
    $femail=$_POST['femail'];
    $fpass=$_POST['fpass'];

    if (empty($femail)) {
        # code...
        $msg="<div class='error'>Enter your email</div>";
    }elseif (empty($fpass)) {
        $msg1="<div class='error'>Enter your Password</div>";
    }elseif (email_exists($femail,$conn)) {
        $pass=mysqli_query($conn,"SELECT password FROM admin_login WHERE email='$femail'");
        $pass_w=mysqli_fetch_array($pass);
        $dpass=$pass_w['password'];

        if ($fpass !== $dpass) {
            $msg1='<div class="error">Password is wrong</div>';
        }else{
            $_SESSION['email']="$femail";
            header("location:admin_panel.php");
        }
    }else{
        $msg='<div class="error">Email Does not exists</div>';
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link href="style/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- <link href="style/style.css" rel="stylesheet"> -->
        <title>Admin Login </title>
        <style>
            .error{
                color: red;
			}
			body{
			/* font-family: 'Times New Roman', Times, serif; */
				outline: none;
				background-color: rgb(248, 248, 195);
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
	font-size: 20px;
	margin-right: 40px;
}
#myNavbar .navbar-nav li a{
	color: #fff;
	font-size: 19px;
}
#myNavbar #course{
	transition: all 0.3s ease-in-out;
}

#myNavbar #course:hover{
	background-color: #c9c7c7;
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
	background-color: #c9c7c7;
}
.nav-back:hover{
	background-color: #bbbdbe;
	display: block;
	transition: all 0.6s ease-in-out;
}
#header{
	background-color: #474a4b;
	color: #fff;
	padding-bottom: 10px;
	margin-bottom: 15px;
}
        </style>
	</head>
		<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h1 style="margin-bottom: 10px; margin-top: 10px;">Admin Login</h1>
				</div>
			</div>
		</div>
	</header>
	
	<body>
	
			<div class="container-fluid bg">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12"></div>
						<div class="col-md-4 col-sm-4 col-xs-12">
						<!-- form start -->
						
						<form class="form-container" method="POST">
							<div class="form-group">
								<h2 style="text-align:center"> Admin Login</h2>
							</div>
							<div class="form-group">
								<label>User Name </label>
                                <input type="email" class="form-control" name="femail"  placeholder="Email" value="<?php echo $femail; ?>" >
                                <?php echo $msg; ?>
							</div>
							<div class="form-group">
								<label>Password</label>
                                <input type="password" class="form-control"name="fpass"  placeholder="Password" >
                                <?php echo $msg1; ?>
							</div>
						  <input type="submit" name="submit" value="Login" class="btn btn-success">			
						</form>
						<!-- form end -->
						</div>
				</div>
			</div>
			
		</body>
</html>