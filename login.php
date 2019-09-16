<?php
	session_start();
	include 'inc\dbconn.php';
	if(isset($_POST["Login"]))
	{		
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$password=$_POST['password'];
		$sql="SELECT * FROM newuser WHERE email='$email' AND password='$password'";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		
		if($count==1)
		{
			$row=mysqli_fetch_array($run_query);
			$_SESSION["name"]=$row["fname"];	
			echo "<script>alert('Your Are Successfully Logged In');</script>";
			echo "<script>history.go(-2);</script>";
		}
		else
		{
			echo "<script>alert('Please Enter Correct Email & Password')</script>";
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
		<style>
			body > .grid {
			  height: 90%;
			}
			.image {
			  margin-top: -100px;
			}
			.column {
			  max-width: 450px;
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
		<script>
			$(document).ready(function() {
			  $('.ui.form')
				.form({
				  fields: {
					email: {
					  identifier  : 'email',
					  rules: [
						{
						  type   : 'email',
						  prompt : 'Please enter a valid e-mail'
						}
					  ]
					},
					password: {
					  identifier  : 'password',
					  rules: [
						{
						  type   : 'length[6]',
						  prompt : 'Your password must be at least 6 characters'
						}
					  ]
					}
				  }
				})
			  ;
			})
		  ;
		</script>
		<div class="ui middle aligned center aligned grid">
		  <div class="column">
			<h2 class="ui teal image header">
			  <img src="img\login-img.png" class="image">
			  <div class="content">
				Login to your account..!
			  </div>
			</h2>
			<form class="ui large form" method="post" action="login.php" autocomplete="off">
			  <div class="ui stacked segment">
				<div class="field">
				  <div class="ui left icon input">
					<i class="user icon"></i>
					<input type="text" name="email" placeholder="John@gmail.com">
				  </div>
				</div>
				<div class="field">
				  <div class="ui left icon input">
					<i class="lock icon"></i>
					<input type="password" name="password" placeholder="Enter Password">
				  </div>
				</div>
				<input type="submit" value="Login" name="Login" class="ui fluid large teal button">
				Not Have Account..!!<a href="registration.php">&nbsp;click to signup</a>
			  </div>
			  <div class="ui error message"></div>
			</form>
		  </div>
		</div>
		<?php
			include 'inc\footer.php';
		?>
	</body>
</html>