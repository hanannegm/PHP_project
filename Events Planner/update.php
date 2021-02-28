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

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/xcode.min.css" />

	<link rel="stylesheet" href="dist/css/bootstrap-select-country.min.css" />
	 

             <div class="container">
                <div class="modal-header" style="text-align">
                <center>
					 
					   <h5 class="modal-title text-center">Edit My Profile</h5>
					 
                </center>
				</div>
				





        <?php
        include_once "customer.php";
        $cust=new Customer();
        $rs=$cust->GetUserBYID();
        if($row=mysqli_fetch_assoc($rs))
        {
  ?>

				<div class="modal-body">
					<form  method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-form-label">First Name</label>
							<input type="text" class="form-control"   value="<?php  echo($row["FirstName"]); ?> " name="txtFName" required="">
						</div>
                        <div class="form-group">
							<label class="col-form-label">Last Name</label>
							<input type="text" class="form-control"   value="<?php  echo($row["LastName"]); ?> " name="txtLName" required="">
						</div>

						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control"  value="<?php  echo($row["Email"]); ?> " name="txtEmail" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" value="<?php  echo($row["Phone"]); ?> " name="txtphone" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control"  value="<?php  echo($row["Password"]); ?> " name="txtPassword"  required="">
						</div>
						 
                    
						<div class="right-w3l" style="text-align:center">
							<input type="submit" class="btn btn-danger"  style="width:45%;height:50px;background-color:Gray;border:Gray" value="Update Profile" name="btnreg">
                            </div>
                         
                        <?php
                            if(isset($_POST["btnreg"]))
                            {
                                include_once "customer.php";
                                $cust=new Customer();
                                $cust->SetFirstName($_POST["txtFName"]);
							    $cust->SetLastName($_POST["txtLName"]);
                                $cust->SetPassword($_POST["txtPassword"]);
                                $cust->SetPhone($_POST["txtphone"]);
                                $cust->SetEmail($_POST["txtEmail"]);

                                $msg=$cust->Update();
                                if($msg=="ok")
                                {
                                    
                                echo("<script> window.open('profile.php', '_self')</script>");		 
                                }
                                else if (strpos($msg,'Email'))
                                echo("<div class='alert alert-warning'>Sorry this email is used try again</div>");	
                                else if (strpos($msg,'Phone'))
                                    echo("<div class='alert alert-warning'>Sorry this Phone is used try again</div>");	
						
							else
								echo("<div class='alert alert-danger'> Error is".$msg."</div>");


                            }

                    ?>
						 
					</form>
				</div>
</div>
        <?php } ?>
	<!--Scripts-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<script src="dist/js/bootstrap-select-country.min.js"></script>
<?php include_once "footer.php" ?>