<?php 

session_start();

include 'common/connect.php';

if (isset($_POST['submit']))
{
	
	# code...
	$email = $_POST['email'];
	$pass  = $_POST['password'];

	$result = $obj->query("select * from user where email='$email' and password='$pass' and role_id='1'");

	$rowcount = $result->num_rows;

	if($rowcount == 1)
	{
		if(isset($_POST['rem']))
		{
			setcookie("email",$email,time()+3600*24*1);
			setcookie("password",$pass,time()+3600*24*1);
		}
		$row = $result->fetch_object();

		
		$_SESSION['admin_id'] = $row->user_id;

		echo "<script>alert('Login successfully');window.location='dashboard.php';</script>";
	}
	else
	{
		echo "<script>alert('invalid email or password');</script>";
	}
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body>
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="#" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="" id="email" value="<?php if(isset($_COOKIE['email']))echo $_COOKIE['email']?>">
							<input type="password" name="password" class="lock" placeholder="Password" required="" id="password" value="<?php if(isset($_COOKIE['password']))echo $_COOKIE['password']?>">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="rem" id="rem" value="rem" <?php if(isset($_COOKIE['email']))echo "checked";?>>Remember me</label>
								<div class="forgot">
									<a href="f_password.php">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
										<button class="btn btn-default" type="submit" name="submit">Sign in</button>
									</div>
								</div>
							 
							<br>
							
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!--footer-->
		
        <!--//footer-->
	
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>