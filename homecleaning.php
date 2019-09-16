<?php
	session_start();
	include 'inc\dbconn.php';
	if(isset($_POST["Proceed"]))
	{		
		if($_SESSION["demoid"]==1)
		{
			header('Location: deephomecleaning.php');
		}
		else if($_SESSION["demoid"]==2)
		{
			header('Location: furniturepolishing.php');
		}
		else if($_SESSION["demoid"]==3)
		{
			header('Location: manualcleaning.php');
		}
		else if($_SESSION["demoid"]==4)
		{
			header('Location: floorscubbing.php');
		}		
	}
?>
<!doctype html>
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
		<title>CleanZee | User Login Page</title>
		  <style type="text/css">
			.MyClass{
				display:none;			
			}
			.MyClass1{
				display:none;
			}
		  </style>
	</head>
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
			<!--Home cleaning Service which you want to book-->
			<div class="ui vertical stripe quote segment">
				<div class="ui horizontal section divider">Home Cleaning Service At Your Doorstep</div>
				<div class="ui equal width stackable internally celled grid">
					<div class="center aligned row">
					<!--Deep Home cleaning-->
						<div class="column">
							<div class="grow">
								<?php
									$sql = "SELECT img,name,id FROM timg where id=1";
									$result = mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($result))
									{
										echo '<img src="data:image/png;base64,'.base64_encode($row['img']).'" id="'.$row["id"].'" class="view_data"/>';
										echo '<br>';
										echo "<h4>".$row['name']."</h4>";
									}
								?>
							</div>
						</div>				
					<!--end Home Deep cleaning-->
					<!--Furniture & Furnishing -->
					<div class="column">
						<div class="grow">
						<?php
							$sql = "SELECT img,name,id FROM timg where id=2";
							$result = mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($result))
							{
								echo '<img src="data:image/png;base64,'.base64_encode($row['img']).'" id="'.$row["id"].'" class="view_data"/>';
								echo '<br>';
								echo "<h4>".$row['name']."</h4>";
							}
						?>
						</div>
					</div>			
					<!--end Furniture & Furnishing--> 
					</div>
				</div>
				<br>
				<div class="ui equal width stackable internally celled grid">
					<div class="center aligned row">
						<!--Manual cleaning-->
						<div class="column">
							<div class="grow">
							  <?php
								$sql = "SELECT img,name,id FROM timg where id=3";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
									echo '<img src="data:image/png;base64,'.base64_encode($row['img']).'" id="'.$row["id"].'" class="view_data"/>';
									echo '<br>';
									echo "<h4>".$row['name']."</h4>";
								}
							  ?>
							</div>
						</div>				
						<!--end Manual cleaning-->
						<!--Floor Scubbing -->
						<div class="column">
							<div class="grow">
								<?php
								$sql = "SELECT img,name,id FROM timg where id=4";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
									echo '<img src="data:image/png;base64,'.base64_encode($row['img']).'" id="'.$row["id"].'" class="view_data"/>';
									echo '<br>';
									echo "<h4>".$row['name']."</h4>";
								}
							  ?>
							</div>
						</div>			
						<!--end Floor Scubbing--> 
					</div>
				</div>
			</div>
			<!--End Home cleaning Service which you want to book-->
			<?php

				include 'inc\footer.php';
			?>
	</body>
</html>
<div class="ui longer test modal">
	<div class="header">
		Home Cleaning
	</div>
	<div class="scrolling image content">
		<div class="ui image">
			<img src="img\homecleaningmodalimg.jpg">
		</div>
		<div class="description" id="service_detail"></div>
	</div>
	<div class="actions">
		<form method="post" > 
		  <input type="submit" name="Proceed" value="Proceed" class="ui primary approve button"><i class="right chevron icon"></i>
		</form>
	</div>			
	
</div>
<script>
	//$('.ui.longer.modal').modal('attach events', '.grow.deep', 'show');
	$(document).ready(function(){
		$('.view_data').click(function(){
			var sid=$(this).attr('id');
			$.ajax({
				url:"select.php",
				method:"post",
				data:{sid:sid},
				success:function(data){
					$('#service_detail').html(data);
					$('.ui.longer.modal').modal('show');
				}
			});
		})
	});
</script>