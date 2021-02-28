<?php 
    session_start();
    if(isset($_SESSION["id"]))
        include_once "headerafter.php";
    else
    include_once "headerbefore.php";
?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/xcode.min.css" />

	<link rel="stylesheet" href="dist/css/bootstrap-select-country.min.css" />
	 

             <div class="container">
                <div class="modal-header" style="text-align">
                <center>
					 
					   <h5 class="modal-title text-center">Update My Profile Page</h5>
					 
                </center>
				</div>
				





                <?php
        include_once "customer.php";
        $cust=new Customer();
        $rs=$cust->GetUserBYID2();
        if($row=mysqli_fetch_assoc($rs))
        {
  ?>

				<div class="modal-body">
					<form  method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input type="text" class="form-control" readonly   value="<?php  echo($row["FirstName"]); ?> " name="txtFName" required="">
						</div>
						 
						<div class="form-group">
							<label class="col-form-label">New Password</label>
							<input type="password" class="form-control"  value="" name="txtPassword" id="password1" required="">
						</div>
						 
                        <div class="right-w3l" style="text-align:center">
							<input type="submit" class="btn btn-danger"  style="width:45%;height:50px" value="Update Profile" name="btnreg">

						</div>
                         
                
                         
                        <?php
                            if(isset($_POST["btnreg"]))
                            {
                                include_once "customer.php";
                                $cust=new Customer();
                               
                                $cust->SetPassword($_POST["txtPassword"]);
                               

                                $msg=$cust->Update2();
                                if($msg=="ok")
                                {
                                    
                                echo("<script> window.open('index.php', '_self')</script>");		 
                                }
                               
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