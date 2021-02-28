 
<?php 
session_start();
if(isset($_SESSION["id"]))
    include_once "headerafter.php";
else
   include_once "headerbefore.php";


?>
	 
<!-- popup for register -->
<div  class="continer">
	<div class="popup">
		<h5 class="modal-title-text-uppercase">Register</h5>
		<div class="lregister-form">
			<form  method="post" class="px-3 pt-3 pb-0">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">First Name</label>
					<input type="text" class="form-control" placeholder="" name="txtFName" id="recipient-name2" required="">
				</div>
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Last Name</label>
					<input type="text" class="form-control" placeholder="" name="txtLName" id="recipient-name3" required="">
				</div>
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Email</label>
					<input type="email" class="form-control" placeholder="" name="txtEmail" id="recipient-name4" required="">
				</div>
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Phone</label>
					<input type="text" class="form-control" placeholder="" name="txtphone" id="recipient-name5" required="">
				</div>
				<div class="form-group">
					<label for="recipient-name1" class="col-form-label">Password</label>
					<input type="password" class="form-control" placeholder="" name="txtPassword" id="recipient-name6" required="">
				</div>
				<div class="right-w3l">
				<input type="submit" class="form-control" value="Register" name="btnreg">
				</div>
				<?php
				if(isset($_POST["btnreg"]))
				{
					$p="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
					if(preg_match($p,$_POST["txtPassword"]))
					 {
						include_once "customer.php";
						$cust=new Customer();
							$cust->SetFirstName($_POST["txtFName"]);
							$cust->SetLastName($_POST["txtLName"]);
							$cust->SetPassword($_POST["txtPassword"]);
							$cust->SetPhone($_POST["txtphone"]);
							$cust->SetEmail($_POST["txtEmail"]);

							$msg=$cust->add();
							if($msg=="ok")
								echo("<div class='alert alert-success'> Your Account has been created done </div>");
							else if (strpos($msg,'Email'))
								echo("<div class='alert alert-warning'>Sorry this email is used try again</div>");	
							else if (strpos($msg,'Phone'))
								echo("<div class='alert alert-warning'>Sorry this Phone is used try again</div>");	
						
							else
								echo("<div class='alert alert-danger'> Error is".$msg."</div>");	
						
					}
					else
					{
						echo("<div class='alert alert-danger'> Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>");
					}
				}
				?>


			</form>
		</div>
	</div>
</div>
<?php include_once"footer.php"?>
