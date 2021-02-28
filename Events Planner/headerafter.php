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
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
								<div class="nav navbar-nav navbar-right">
					<!-- header lists -->
					
						<li class="hvr-sweep-to-right" >
							<a href="profile.php"  class="text-white">
								<i class="nav navbar-nav navbar-right"></i>
								 <?php
								include_once "customer.php";

								if(isset($_SESSION["name"]))
									echo("Welcom :" .$_SESSION["name"]) ;
								else
								echo("<script> window.open('index.php', '_self')</script>");		 
								?></a>
													
					

						</li>

						<div class="nav navbar-nav navbar-right" style="width:65px;height:40px;text-align:right;margin-left:20px;">
								 
								 <a href="reservation.php">
								 <button class="hvr-sweep-to-right" type="submit" name="submit" value="" style="width:60px;height:40px;text-align:right;margin-right:5px;">
									 
									 <i class="fas fa-bars"></i>
									 <?php
										 include_once "Database.php";
										 $db=new Database();
									   $rs= $db->GetData("select count(*) as countpro from `reservtemp` where ClientID='".$_SESSION["id"]."'");
										 if($row=mysqli_fetch_assoc($rs))
										 {
											 echo ($row["countpro"]);
										 }
										 else
										 echo("0");
										 ?>
								 </button>
 </a>
							  
						 </div>

					<!-- //header lists -->
				</div>
		
				<br/>
				<br/>
		

	
						<ul class="nav navbar-nav navbar-right" style="margin-left:5px;margin-right:300px">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
                            <li><a class="hvr-sweep-to-right" href="index.php">Home</a></li>
							<li><a class="hvr-sweep-to-right" href="events.php">Event Styling</a></li>
							<li > <a class="hvr-sweep-to-right" href="#reserv-popup">Creating Event</a> </li>
							<li><a class="hvr-sweep-to-right" href="#">Compliants</a></li>
  					        <li><a class="hvr-sweep-to-right" href="contact.php">Contact</a></li>
					        <li> <a class="hvr-sweep-to-right" href="logout.php" >Log out</a></li>
					        <li > <a class="hvr-sweep-to-right" href="#login-popup">Unsubscribe</a> </li>

                   </ul>
				   <div class="nav navbar-nav navbar-right" style="width:25%;height:65%;margin-left:300px;margin-right:0px">
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
					</div>

					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- popup for login -->
<div id="login-popup" class="popup-effect" tabindex="-1" role="dialog" aria-hidden="true">>
	<div class="popup" role="document">
		<h5 class="modal-title text-uppercase" style="font-size:20px;color:black;text-align:center;">Delet My Account</h5>
		<br/>

		<div class="login-form">
			<form  method="post"  class="px-3 pt-3 pb-0">
		         	<div class="form-group alert alert-danger" style="font-size:15px;background-color:LightGray;text-align:center;color:black;border:LightGray;">
						Are you sure delete your accoount ? 
					</div>
				
				<div class="right-w3l" style="text-align:center">
							<input type="submit" style="font-size:15px;background-color:#ffb10a;color:black;border:#ffb10a; " class="btn btn-danger" value="Yes" name="yes">
							<a href="index.php" style="font-size:15px;background-color:#ffb10a;color:black;border:#ffb10a; "   class="btn btn-success" value="No" name="no"> No </a>
						</div>

						<?php
					 
							 
								if(isset($_POST["yes"]))
								{
								    include_once "customer.php";
									$cust=new Customer();
									 $msg=$cust->delete();
									 if($msg=="ok")
										{
											
										   echo("<script> window.open('logout.php', '_self')</script>");		 
										}
										else
										   echo("<div class='alert alert-danger'> ".$log."</div>");
								}

							?>

			</form>

		</div>
		<a class="close" href="#">&times;</a>
	</div>
</div>
<!-- Reserv-popup -->
<div id="reserv-popup" class="popup-effect">
	<div class="popup">
					<h3 class="heading-agileinfo white-w3ls">Event Booking<span class="black-w3ls">Evento is a professionally managed Event</span></h3>
			<div class="about-grids">
				
				<div class="abt-rt-grid">
					<div class="w3ls-grid-head text-center">
						<h3>online event booking </h3>
					</div>
					<div class="abt-form text-center">
						<form  method="post">
							<div class="col-sm-4 col-xs-4 w3ls-lt-form">
								<div class="w3ls-pr">
									
									<input type="text" name="txtFName" placeholder="Name">
									<input type="email" name="txtEmail" placeholder="Email"required="required">
									<input type="tel" name="txtphone" placeholder="Phone" required="required">
								    <input type="date" name="txtdate" required="required">

								</div>
							</div>
							<div class="col-sm-4 col-xs-4 w3ls-lt-form">
								<div class="w3ls-pr">
									<input type="time" name="txtstime" required="required">
									<input type="time" name="txtetime" required="required">
									<input type="text" name="txtename"  placeholder="Event Name" required="required">
					
								</div>
							</div>
						
							
							<div class="clearfix"></div>
							<input type="submit"  style="width:45%; "value="Book Now" name="book"> 
							<?php
				if(isset($_POST["book"]))
				{ 

					    //EventID	EventDate		StartTime	EndTime		EventName
						include_once "customer.php";
						$cust=new Customer();
						$cust->SetFirstName($_POST["txtFName"]);
						$cust->SetEmail($_POST["txtEmail"]);
						$cust->SetPhone($_POST["txtphone"]);


						include_once "eventclass.php";
						$event=new Event();
							$event->SetEventName($_POST["txtename"]);
							$event->SetEventDate($_POST["txtdate"]);
							$event->SetStartTime($_POST["txtstime"]);
							$event->SetEndTime($_POST["txtetime"]);
							
							$msg=$event->add();
							
							if($msg=="ok")
							    echo("<div class='alert alert-success'>Your Reservation Has Been Done</div>");	
							
						 else
								echo("<div class='alert alert-danger'> Error is".$msg."</div>");

								
								//$book=$event->Book();
								//if($row=mysqli_fetch_assoc($book))
								//{
								 // $_SESSION["eid"]=$row["EventID"];

								 //$_SESSION["id"]=$row["ClientID"];
								 //header("location:indexafter.php");

								  //echo("<script> window.open('indexafter.php', '_self')</script>");		 
								//}
								//while($row = mysqli_fetch_assoc($book)){
								//	echo $row["<div class='alert alert-danger'> </div>"].'<br>';
								//}
						  
								


						
				}
				?>




						</form>
					</div>
					<a class="close" href="#">&times;</a>

				</div>
			</div>
	</div>
	</div>
		<!-- //header -->



		
