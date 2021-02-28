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

    
	<!--Events --> 
		<div class="events-agileits-w3layouts">
		<div class="container">
		<h2 class="heading-agileinfo">Events</h2>
		<h4 style="font-size:25px;color:bleck;text-align:center;">May it be a wedding, debut, kid’s birthday, private or corporate, let us create the perfect theme for your event. 
		We can do it from scratch, or you can choose from one of our pre-created events styles, 
		fully customizable so you get exactly what you want while staying within your budget.</h4>
				<div class="popular-grids">
					<div class="col-md-4 popular-grid">
						<img src="images/g7.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal2">Birthday Party</a></h5>
							<div class="detail-bottom">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore sed do eiusmod tempor incididunt ut labore</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 popular-grid">
						<img src="images/g8.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal">Weddings</a></h5>
							<div class="detail-bottom">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore sed do eiusmod tempor incididunt ut labore</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 popular-grid">
						<img src="images/g6.jpg" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal">Graduation Party</a></h5>
							<div class="detail-bottom">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore sed do eiusmod tempor incididunt ut labore</p>
							</div>
						</div>
					</div>
				
					<div class="col-md-4 popular-grid" style="text-align:center">
						<img src="images/g2.jpg"  style="text-align:center" class="img-responsive" alt=""/>
						<div class="popular-text">
							<h5><a href="#" data-toggle="modal" data-target="#myModal">Conference</a></h5>
							<div class="detail-bottom">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore sed do eiusmod tempor incididunt ut labore</p>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
		</div>
<!-- //Events --> 

	<!-- //events -->
<?php include_once"footer.php"?>
</body>
</html>