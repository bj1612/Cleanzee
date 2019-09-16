<?php
	session_start();
	include 'inc\dbconn.php';
		if(isset($_POST['send']))
		{
			$address1=$_POST['address1'];
			$address2=$_POST['address2'];
			$mobile=$_POST['mobile'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$postalcode=$_POST['postalcode'];
			$name=$_SESSION['name'];
			
			$query="INSERT INTO `shippingadd`(`fname`, `address1`, `address2`, `mobile`, `city`, `state`, `postalcode`) VALUES('$name','$address1','$address2','$mobile','$city','$state',$postalcode)";

			try
			{	
				if($result=mysqli_query($conn,$query))
				{
			
					header('location:payment.php');

				}
				else
				{
					echo "<script>alert('Error');</script>";
				}
				
			}catch(Exception $ex)
			{
				echo("error".$ex->getMessage());
			}
		}

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
<script type="text/javascript">
		  $(document)
			.ready(function() {
			  $('.ui.form')
				.form({
				  fields: {
					address1: {
					  identifier  : 'address1',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please enter your address'
						}
					  ]
					},
					address2: {
					  identifier  : 'address2',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please enter your street or locality'
						}
					  ]
					},
					mobile: {
					  identifier  : 'mobile',
					  rules: [
						{
						  type   : 'length[10]',
						  prompt : 'Please enter your 10 Digit mobile number'
						}
					  ]
					},
					city: {
					  identifier  : 'city',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please enter your city name'
						}
					  ]
					},
					state: {
					  identifier  : 'state',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please enter your state'
						}
					  ]
					},
					  postalcode: {
						identifier: 'postalcode',
						rules: [
						  {
							type   : 'empty',
							prompt : 'Please enter your postalcode'
						  }
						]
					  }
				  }
				})
			  ;
			})
		  ;
</script>
<body>
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
			if(isset($_SESSION['name']))
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
		<div class="ui text container">
			<div class="header"><center><img src="img\delivery.png">Address...</center></div>
			<form class="ui form segment" method="post">
				<div class="ui error message"></div>
				<div class="field">
					<label>Address Line 1</label>
					<input type="text" name="address1" placeholder="Ex. Room No 2,Saikrupa Building">
				</div>
				<div class="field">
					<label>Street/Locality</label>
					<input type="text" name="address2" placeholder="Ex Next to R.J. College, Ghatkopar(W)">
				</div>
				<div class="two fields">
					<div class="field">
						<label>Mobile Number</label>
						<input type="text" id="locality"  name="mobile" placeholder="Ex. 9221021193">
					</div>	
					<div class="field">
						<label>City</label>
						<input type="text" id="city" name="city" placeholder="Ex.Mumbai">
					</div>				
				</div>
				<div class="two fields">
					<div class="field">
						<label>State</label>
						<input type="text" id="state" name="state" placeholder="Ex.Maharashtra">
					</div>	
					<div class="field">
						<label>PostalCode</label>
						<input type="text" id="postalcode" name="postalcode" placeholder="Ex.400086">
					</div>				
				</div>
				<center>
						<input type="submit" name="send" value="Next" class="fluid ui inverted green button">
					
				</center>
			</form>
		</div>

		<?php
		
			include 'inc\footer.php';

			
		?>
</body>
</html>