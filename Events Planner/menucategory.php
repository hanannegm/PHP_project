<?php 
    session_start();
    if(isset($_SESSION["id"]))
        include_once "headerafter.php";
    else
    include_once "headerbefore.php";
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



 <!-- top Products -->
 <div class="ads-grid py-sm-5 py-4">
     <div class="container py-xl-4 py-lg-2">
         <!-- tittle heading -->
         <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
             <span>O</span>ur
             <span>M</span>enus</h3>
         <!-- //tittle heading -->



         <h3 class="heading-tittle text-center font-italic">Latest Menus</h3>





         <div class="ser_agile">
             <!-- product left -->
             <div class="agileinfo-ads-display col-lg-20">
                 <div class="ser_agile">
                     <!-- first section -->
                     <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                     
                   
                         <div class="row">
                         <?php
                                include_once "menus.php";
                                $menu=new Menus();
                              if($_GET["CategoryID"]==0)
                                   $rs=$menu->GetAll();
                                else
                                    $rs=$menu->GetAllBID();
                                while($row=mysqli_fetch_assoc($rs))
                                {
                        ?>

                             <div class="col-md-4 product-men mt-5">
                                 <div class="men-pro-item simpleCart_shelfItem" style="width:250px;hieght:255px">
                                     <div class="men-thumb-item text-center">
                                         <img src="images/menus/<?php echo($row["MenuID"]); ?>.jpg" style="width:150px;hieght:155px"alt="">
                                         <div class="men-cart-pro">
                                             <div class="inner-men-cart-pro"style="color:#ffb10a;font-size:1.5em">
                                             </div>
                                         </div>
                                     </div>
                                     <div class="item-info-product text-center border-top mt-4" style="color:#ffb10a;font-size:1.5em">
                                         <h4 class="pt-1" style="color:#ffb10a;font-size:1em">
                                             <a href="#?mid=<?php echo($row["MenuID"]); ?>"> <?php echo($row["MenuName"]); ?> </a>
                                         </h4>
                                         <div class="info-product-price my-2">
                                             <span class="item_price">$<?php echo($row["Price"]-($row["Price"]*($row["Discount"]/100))); ?></span>
                                             <del>$ <?php echo($row["Price"]); ?></del>
                                         </div>
                                      
                             </br>
                                         <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                             <form   method="post">
                                                <br/>
                                                    
                                                 <?php
                                                           
                                                           if(isset($_SESSION["id"]))
                                                           {
                                                            echo('<input type="submit"style="background-color:Gray;border-color:Gray" name="btn1'.$row["MenuID"].'" value="Reservation"  class="button btn" />');
                                                           }
                                                           else{

                                                               echo("<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#login-popup'>Reservation</button>"); 
                                                           }

                                                           if(isset($_POST["btn1".$row["MenuID"]]))
                                                           {
                                                               include_once "Database.php";
                                                               $db=new Database();
                                                               $msg=$db->RunDML("insert into `reservtemp` values('".$row["MenuID"]."','".$row["MenuName"]."','".$row["Price"]."','".$_SESSION["id"]."','Default')");
                                                               if($msg=="ok")
                                                               
                                                                   echo("<div class='alert alert-success'>  Reservation Done </div>");
                                                               }
                                                           }
                                               ?>
                                                 
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     
                 </div>
             </div>
             <!-- //product left -->

            
         </div>
     </div>
 </div>
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




<?php include_once "footer.php" ?>