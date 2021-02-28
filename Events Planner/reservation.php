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

<form method="post">
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">You Reservation:
					<span> 
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
                    
                    Menus</span>
				</h4>
				<div class="table-responsive">
					<table style="margin:25px;width:150%;" class="table table-borderd table-striped">
						<thead>
							<tr>
								
								<th>Menu Name</th>
                                <th>Price</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                        include_once "Database.php";
                        $db=new Database();
                        $x=1;
                       $rs= $db->GetData("select  *  from `reservtemp` where ClientID='".$_SESSION["id"]."'");
                        while($row=mysqli_fetch_assoc($rs))
                        {

                        ?>
							<tr class="rem1">
								
								
								<td class="invert"><?php echo($row["MenuName"]); ?></td>
                                <td class="invert">$<?php echo($row["Price"]); ?></td>
								
							</tr>
                        <?php  $x++;} ?>
                        <th>
                        <div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4"style="text-align:center;">
				 
					<div class="checkout-right-basket" style="text-align:center;">

					    <tr><td colspan="2" style="text-align:center"><input type="submit" value="Confirm Reservation" class="btn btn-danger" style="width:35%; highit:60px;background-color:Gray;border-color:Gray;text-align:center " name="btnconfirm"/></td></tr>
                        <tr><td colspan="2" style="text-align:center"><a class="btn btn-waring" href="#cancel-popup"  style="width:35%;highit:60px;background-color:Gray;">Cancel Reservation</a> </td></tr>

                       
					</div>
				</div>
			</div>
                   <?php
                        include_once "Database.php";
                        $db=new Database();
                 
                          if(isset($_POST["btnconfirm"]))
                          {
                              include_once "Database.php";
                              $db=new Database();
                              $msg=$db->RunDML("insert into `reserv` values('Default','". Date("Y/m/d")."','Pending','".$_SESSION["id"]."')");

                              if($msg=="ok")
                              {
                              
                                
                                    echo("<div class='alert alert-success'>Your Reservation Has Been sent  </div>");
                              }

                                else
                                echo($msg);

            
                          }
                           
                    ?>
                        </th>

                   </tr>
                        
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>

                        </form>
                        <br/>
                        <br/>
                        <br/>
 <!-- popup for cancel -->
 <div id="cancel-popup" class="popup-effect" tabindex="-1" role="dialog" aria-hidden="true">>
	<div class="popup" role="document">
		<h5 class="modal-title text-uppercase" style="font-size:20px;color:black;text-align:center;">Cancel Reservation</h5>
		<br/>

		<div class="login-form">
			<form  method="post" action="#" class="px-3 pt-3 pb-0">
		         	<div class="form-group alert alert-danger" style="font-size:15px;background-color:LightGray;text-align:center;color:black;border:LightGray;">
						Are you sure cancel your reservation ? 
					</div>
				
				<div class="right-w3l" style="text-align:center">
							<input type="submit" style="font-size:15px;background-color:#ffb10a;color:black;border:#ffb10a; " class="btn btn-danger" value="Yes" name="yes">
							<a href="index.php" style="font-size:15px;background-color:#ffb10a;color:black;border:#ffb10a; "   class="btn btn-success" value="No" name="no"> No </a>
						</div>

						<?php
					 
							 
								if(isset($_POST["yes"]))
								{
								    include_once "Database.php";
                                    $db=new Database();
                                    $msg=$db->RunDML("delete from `reservtemp` where ClientID='".$_SESSION["id"]."'");			
                                     if($msg=="ok")
										{
											
										   echo("<script> window.open('reservation.php', '_self')</script>");		 
										}
										else
										   echo("<div class='alert alert-danger'> ".$msg."</div>");
								}

							?>

			</form>

		</div>
		<a class="close" href="#">&times;</a>
	</div>
</div>

<?php include_once "footer.php" ?>