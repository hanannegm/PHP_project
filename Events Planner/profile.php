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

<div class="container" style="paddind-top:150px;paddind-bottom:150px">
<center>
<br/>
<br/>
<br/>


<captionstyle="margin:25px"> <h3><b> My Profile </h3></b> </caption>
<form   method="post" >
<table style="margin:25px;width:150%;" class="table table-borderd table-striped">
<?php
       include_once "customer.php";
       $cust=new Customer();
       $rs=$cust->GetUserBYID();
       if($row=mysqli_fetch_assoc($rs))
        {
  ?>
          <tr > <td> Full Name </td><td><?php  echo($row["FirstName"] . " "  .  $row["LastName"]); ?>  </td></tr>
          <tr> <td> Email  </td><td><?php  echo($row["Email"]); ?>  </td></tr>
          <tr> <td> Password  </td><td><?php  echo($row["Password"]); ?>  </td></tr>
          <tr> <td> Phone   </td><td><?php  echo($row["Phone"]); ?>  </td></tr>
    
          <?php
        } 
        ?>
</table>
  
<tr><td colspan="2" style="text-align:center"><a href="update.php"  name="upd" class="btn btn-waring" style="width:45%; highit:60px;background-color:Gray; ">Edit Profile <a></td></tr>


</form>


</center>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php include_once "footer.php" ?>	
