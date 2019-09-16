<?php
	session_start();
	include 'inc\dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.js"></script>
    <title>CleanZee | The Professional Home Service</title>
  </head>
  <style type="text/css">
	.MyClass{
		display:none;			
	}
	.MyClass1{
		display:none;
	}
  </style>
  <body>
	<?php
			include 'inc\header.php';
		if($_SESSION['name'])
		{
			?>
			<script>
				document.getElementById("username").innerHTML="<?php echo $_SESSION['name']; ?>";
				document.getElementById("login").classList.add('MyClass');
				document.getElementById("signup").classList.add('MyClass1');
				document.getElementById("logout").style.display = "";
			</script>
			<?php
			$query="SELECT count(*) as data FROM `carttbl` WHERE userid='".$_SESSION['name']."'";
			try
			{	
				$result=mysqli_query($conn,$query);

			}catch(Exception $ex)
			{
				echo("error".$ex->getMessage());
			}
			while($row=mysqli_fetch_array($result))
			{
			?>
				<script>			
					document.getElementById("bag").innerHTML="<?php echo $row['data']; ?>";
					document.getElementById("modelcancelbtn").style.display='inline';
					document.getElementById("modelcheckoutbtn").style.display='inline';
				</script>
				<?php
					if($row['data']==0)
					{
						?>
						<script>
							document.getElementById('cartdata').innerHTML = '<center><h1>Please add service in your cart<h1><center>';
							document.getElementById("modelcancelbtn").style.display='none';
							document.getElementById("modelcheckoutbtn").style.display='none';
						</script>";
						<?php
					}
			}
		}
		else
		{
			echo "<script>document.getElementById('cartdata').innerHTML = '<center><h1>Please login to see cart</h1></center>';</script>";
		}
		?>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('.carousel').carousel({interval: 1900});
			});
		</script>
		<!-- Carousel -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner" style="margin-top:1.2em;">
				<div class="carousel-item  active">
					<img class="d-block w-100" src="img\c3.jpg" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Beautician</h3>
							<p>We Provide All The Basic and Advanced Beuticare Treatment With Low Cost</p>
						</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img\c1.jpg" alt="First slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Painting</h3>
							<p>There are two types of painting available Fresh 4 Repaint</p>
						</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img\c4.jpg" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Repairing</h3>
							<p>We Provide All The Basic and Advanced Beuticare Treatment With Low Cost</p>
						</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img\c5.jpg" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Handyman</h3>
							<p>We Repair All The Home-Appliances Includes Ac, Tv and Washing Machine ect</p>
						</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="img\c7.png" alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h3>Beutician</h3>
							<p>We Provide All The Basic and Advanced Beauticare Treatment With Low Cost</p>
						</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- End Corousel-->
		<!--Select Service which you want to book-->
		 <div class="ui vertical stripe quote segment">
		  <div class="ui horizontal section divider">Select Service At Your Doorstep</div>
			<div class="ui equal width stackable internally celled grid">
			  <div class="center aligned row">
				<!--Home cleaning-->
				<div class="column">
				  <div class="photo">
				  <a href="homecleaning.php">
					  <img src="img\homecleaning.png"/>
					  <h4 class="black alink">Home Cleaning</h4>
				  </a>
				  </div>
				</div>
				<!--end Home cleaning-->

				<!--Pest Control-->
				<div class="column">
				  <div class="photo">
				  <a href="">
					  <img src="img\pestcontrol.png"/>
					  <h4 class="black alink">Pest Control</h4>
				  </a>
				  </div>
				</div>
				<!--end Pest Control-->

				<!--Painting-->
				<div class="column">
				  <div class="photo">
				  <a href="#">
					  <img src="img\painting.png"/>
					  <h4 class="black alink">Painting</h4>
				  </a>
				  </div>
				</div>
				<!--end Painting-->

			  </div>
			</div>
			<!--
			<br /><br /><br />
			<div class="ui equal width stackable internally celled grid">
			  <div class="center aligned row">
				
				<div class="column">
				  <div class="photo">
				  <a href="">
					  <img src="img\plumbing.png"/>
					  <h4 class="black alink">Plumber Service</h4>
				  </a>
				  </div>
				</div>
				

				
				<div class="column">
				  <div class="photo">
				  <a href="#">
					  <img src="img\appliances.png"/>
					  <h4 class="black alink">Appliances Service</h4>
				  </a>
				  </div>
				</div>
				

				
				<div class="column">
				  <div class="photo">
				  <a href="#">
					  <img src="img\electrical.png"/>
					  <h4 class="black alink">Electrician Service</h4>
				  </a>
				  </div>
				</div>-->

			  </div>
			</div>
			<br /><br /><br />
			<div class="ui equal width stackable internally celled grid">
			  <div class="center aligned row">
				<!--Skin care-->
				<div class="column">
				  <div class="photo">
				  <a href="#">
					  <img src="img\skincare.png"/>
					  <h4 class="black alink">Skin care Service</h4>
				  </a>
				  </div>
				</div>
				<!--end Skin care-->

				<!--Hair Care-->
				<div class="column">
				  <div class="photo">
				  <a href="#">
					  <img src="img\haircare.png"/>
					  <h4 class="black alink">Hair care Service</h4>
				  </a>
				  </div>
				</div>
				<!--Hair Skin care-->

				<!--Make up-->
				<div class="column">
				  <div class="photo">
				  <a href="#">
					  <img src="img\makeup.png"/>
					  <h4 class="black alink">Makeup Service</h4>
				  </a>
				  </div>
				</div>
				<!--end Makeup-->
			  </div>
			</div>
		  </div>
		<!--End Select Service which you want to book-->
		<hr>
		<!--How It Work-->
		  <div class="ui vertical stripe quote segment">
		  <div class="ui horizontal section divider">How it work</div>
			<div class="ui equal width stackable internally celled grid">
			  <div class="center aligned row">
				<div class="column">
					<h4>Step 1:</h4>
					<img src="img\book.png"/>
					<h4>Book</h4>
					<h6>From a wide range of</h6>
					<h6>home services</h6>
				</div>
				<div class="column">
					<h4>Step 2:</h4>
					<img src="img\pay.png"/>
					<h4>Pay</h4>
					<h6>Before and after</h6>
					<h6>the service is done</h6>
				</div>
				<div class="column">
					<h4>Step 3:</h4>
					<img src="img\relax.png"/>
					<h4>Relax</h4>
					<h6>While your home</h6>
					<h6>service get done</h6>
				</div>
			  </div>
			</div>
		  </div>
		<!--End How It Work-->
		
		<!--Promise-->
		  <div class="ui vertical stripe quote segment">
		  <div class="ui horizontal section divider">We Provide Quality Service</div>
			<div class="ui equal width stackable internally celled grid">
			  <div class="center aligned row">
				<div class="column">
				  <img src="img\ontime.png"/>
				  <h6>On Time</h6>
				  <h6>Quality Service</h6>
				</div>
				<div class="column">
				  <img src="img\service.png"/>
				  <h6>Service</h6>
				  <h6>Guarantee</h6>
				</div>
			  </div>
			</div>
		  </div>
		<!--End Promise-->
		<?php
			include 'inc\footer.php';
		?>
    </form>
  </body>
</html>