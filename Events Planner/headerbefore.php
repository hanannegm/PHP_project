<?php
//session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Events Planner</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
 
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- //web-fonts -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
				<!-- header -->
				<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Evento</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.php">Evento</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
								<!-- top header -->
		<!-- top header -->
		<div class="nav navbar-nav navbar-right" style="width:25%;height:65%;text-align:right">
					<form  method="post">
						<select id="agileinfo-nav_search" style="background-color:#ffb10a;width:40%;height:30px;border-color:#ffb10a;"onchange="this.form.submit()" name="agileinfo_search" class="" required="" >
						 
							<option value="0">All Menus</option>
							<?php
							 include_once "menusclass.php";
							 $cat=new Category();
							 $rs=$cat->GetAll();
							 while($row=mysqli_fetch_assoc($rs))
							 {
							?>    
							

							<option <?php if(isset($_GET["CategoryID"])){ if($_GET["CategoryID"]==$row["CategoryID"]) echo("Selected"); }  ?> value="<?php echo($row["CategoryID"]); ?>">  <?php echo($row["CategoryName"]); ?>  </option>
							 <?php } ?>
							 
						</select>
						<?php
								if(isset($_POST["agileinfo_search"]))
								{
									$no=$_POST["agileinfo_search"];
									//echo($no);
									echo("<script> window.open('menucategory.php?CategoryID=$no', '_self')</script>");		 		
								}
						?>
					</form>
				</div>

						<ul class="nav navbar-nav navbar-right">
						
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="hvr-sweep-to-right" href="index.php">Home</a></li>
							<li><a class="hvr-sweep-to-right" href="about.php">About</a></li>

							
							 
						    <li><a class="hvr-sweep-to-right" href="#login-popup">Login</a></li>
							<li><a class="hvr-sweep-to-right" href="register.php">Register</a></li>

					</ul>
						
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	

		<!-- //header -->

<!-- popup for login -->
<div id="login-popup" class="popup-effect">
	<div class="popup">
		<h5 class="modal-title text-uppercase">Login</h5>
		<div class="login-form">
			<form  method="post" class="px-3 pt-3 pb-0">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Email </label>
					<input type="email" class="form-control" placeholder="" name="txtuser" id="recipient-name" required="">
				</div>
				<div class="form-group">
					<label for="recipient-name1" class="col-form-label">Password</label>
					<input type="password" class="form-control" placeholder="" name="txtpassword" id="recipient-name1" required="">
				</div>
				<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in" name="btnlogin">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" name="chk" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="register.php" >
								Register Now </a>  <br/> <br/> <!--<a href="checkmail.php">Forget Password</a> -->
						</p>

						<?php
					 
							 
								if(isset($_POST["btnlogin"]))
								{
								

									include_once "customer.php";
									$cust=new Customer();
									 
										$cust->SetPassword($_POST["txtpassword"]);
										$cust->SetEmail($_POST["txtuser"]);
										$cust->SetPhone($_POST["txtuser"]);

										$log=$cust->Login();
										if($row=mysqli_fetch_assoc($log))
										{
										  $_SESSION["id"]=$row["ClientID"];
	
										  $_SESSION["name"]=$row["FirstName"];
										 //header("location:indexafter.php");

										  echo("<script> window.open('index.php', '_self')</script>");		 
										}
else 
echo("<div class='alert alert-danger'> Invalied Email or Password </div>")	;							  
								}

							?>

			</form>

		</div>
		<a class="close" href="#">&times;</a>
	</div>
</div>




		
