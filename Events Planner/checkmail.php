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
		<h5 class="modal-title-text-uppercase">Forget Password</h5>
		<div class="lregister-form">
			<form  method="post" class="px-3 pt-3 pb-0">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Email</label>
					<input type="email" class="form-control" placeholder="" name="txtEmail" id="recipient-name4" required="">
				</div>
				<div class="right-w3l">
				<input type="submit" class="form-control" value="GO" name="forg">
				</div>

				<?php
				if(isset($_POST["forg"]))
				{
					
						include_once "customer.php";
                        $cust=new Customer();
                        $email=$_POST["txtEmail"];
                        $cust->SetEmail($email);
                        $rs=$cust->GetUserBYEmail();

                        if($row=mysqli_fetch_assoc($rs))
                        {
                            require_once "src/PHPMailer.php";
                            require_once "src/Exception.php";
                            require_once "src/SMTP.php";
                            require_once "vendor/autoload.php";
                                
                                $mail = new  PHPMailer\PHPMailer\PHPMailer();
        
                                $mail->IsSMTP();
                                //$mail->SMTPDebug = 1;
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port = 465; // or 587
                                $mail->IsHTML(true);
    
                                $mail->Username = "yourmobileapp2017@gmail.com";
                                $mail->Password = "MMMCA@123";
    
                                $mail->setFrom('yourmobileapp2017@gmail.com', 'Nti Project');
                              
                                

                                $mail->addAddress($email, "NTI Project");
                                $mail->Subject = 'Forget Password';
                                $id=$row["ClientID"];
                                $mail->Body = "Dear Mr/Mrs ".$row['FirstName']."<br/>http://localhost/NTIProject/UPW.php?uid=$id";
                                
                                if(!$mail->send()) {
                                  //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }
                                else{
                                    
                                    echo("<div class='alert alert-success'> Check Your Email </div>");		 
                                } 

                        }
                        else
                        echo("<div class='alert alert-danger'> This Email Not Exist , Try again  </div>");		 
                  
				}
                
				?>



			</form>
		</div>
        <a class="close" href="#">&times;</a>

	</div>
</div>
<?php include_once"footer.php"?>
