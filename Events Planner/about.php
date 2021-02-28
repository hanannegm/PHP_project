<?php 
    session_start();
    if(isset($_SESSION["id"]))
        include_once "headerafter.php";
    else
    include_once "headerbefore.php";
?><!-- about -->
<!-- about -->
	<div class="about">
		<div class="container">
		<h2 class="heading-agileinfo">About Us<span>Events is a professionally managed Event</span></h2>
			<div class="about-grids-1">
				<div class="col-md-5 wthree-about-left">
					<div class="wthree-about-left-info">
						<img src="images/g3.jpg" alt="" />
					</div>
				</div>
				<div class="col-md-7 agileits-about-right">
					<p> Evento grew to be one of the leading companies in the light, sound,decore,food,places.

						We have a well trained staff and highly experienced technicians, which made us able to covwe every
						event all over Egypt.

						We stand ready to meet all your requiremenrts using update creative and best promontinal ideas, throgh:
						Promotion campaigns, exhibitions, festivls, fashion shows, business meetings.

					</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- offers -->
	<div class="offers">
		<div class="container">
			
			<h3 class="heading-agileinfo white-w3ls">Our Offers<span class="black-w3ls">Events is a professionally managed Event</span></h3>
			<div class="offers-grids">
				<div class="col-md-6 wthree-offers-left">
					<div class="offers-left-heading">
						<h4>Quisque eu ullamcorper dui. Nullam commodo ornare ipsum.</h4>
					</div>
					<div class="offers-left-grids">
						<div class="offers-number">
							<p>1</p>
						</div>
						<div class="offers-text">
							<p>Integer egestas non lorem eget aliquet. Nulla egestas felis et maximus elementum. Morbi a dui ac nunc mollis rhoncus. Mauris eu erat vitae enim congue placerat. Integer consequat aliquet facilisis. Phasellus ut venenatis nisi, et lobortis sem.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="offers-left-grids offers-left-middle">
						<div class="offers-number">
							<p>2</p>
						</div>
						<div class="offers-text">
							<p>Integer egestas non lorem eget aliquet. Nulla egestas felis et maximus elementum. Morbi a dui ac nunc mollis rhoncus. Mauris eu erat vitae enim congue placerat. Integer consequat aliquet facilisis.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="offers-left-grids">
						<div class="offers-number">
							<p>3</p>
						</div>
						<div class="offers-text">
							<p>Integer egestas non lorem eget aliquet. Nulla egestas felis et maximus elementum. Morbi a dui ac nunc mollis rhoncus. Mauris eu erat vitae enim congue placerat.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-6 wthree-offers-right">
					<h5>Cras consequat et velit quis molestie. Etiam bibendum laoreet enim, nec malesuada ex fermentum et. Donec molestie diam nec lorem accumsan bibendum.</h5>
					<p>Vivamus est sem, pellentesque vel libero sit amet, varius tempor orci. Integer egestas metus vitae ultrices tristique. Fusce lectus dui, venenatis vitae justo nec, aliquet feugiat nunc. </p>
					<ul>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Phasellus sem leo, interdum quis risus</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Nullam egestas nisi id malesuada aliquet </a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Donec condimentum purus urna venenatis</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Ut congue, nisl id tincidunt lobor mollis</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Cum sociis natoque penatibus et magnis</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Suspendisse nec magna id ex pretium</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-angle-right" aria-hidden="true"></i> Ut congue, nisl id tincidunt lobor mollis</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- offers -->
<!-- about -->
<?php include_once "footer.php" ?>	

</body>
</html>