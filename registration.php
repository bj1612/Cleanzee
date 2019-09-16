<?php
	session_start();
	include 'inc\dbconn.php';
	
		function generatePIN($digits = 4)
		{
		    $i = 0; //counter
		    $pin = ""; //our default pin is blank.
		    while($i < $digits)
			{
		        //generate a random number between 0 and 9.
		        $pin .= mt_rand(0, 9);
		        $i++;
		    }
		    return $pin;
		}	
			$flag=0;
		if(isset($_POST['submit1']))
		{
			if(isset($_POST['email']))
			{
				$pin = generatePIN();
				$_SESSION["pin"]=$pin;	
				$email=$_POST['email'];
				include 'Test/phpmailer/PHPMailerAutoload.php'; 
				$mail = new PHPMailer(); 
				$mail->SMTPAuth = true;
				$mail->IsSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->Username = 'vikki2446@gmail.com';                 
				$mail->Password = 'newredrose';                           
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;
				$mail->isHTML(true);
				$mail->SMTPDebug = 0;
				$mail->CharSet = "utf-8*";                   
				$mail->setFrom('vikki2446@gmail.com');
				$mail->Subject= 'OTP from CleanZee';
				$mail->Body = "Hello, Your One Time Password(OTP) is ". $pin;
				$mail->addAddress($email);
				if(!$mail->send())
				{
					echo "<script>alert('Unable to send mail!');</script>";
					$flag=1;
				}
				else
				{
				  echo "<script>alert('OTP has been sent to your mail');</script>";
				  $flag=2;
				}
			}

		}
		if($flag==2)
		{
			echo "<script>document.getElementById('mySubmit').disabled = true;</script>";
		}
				
		if(isset($_POST['otpbtn']))
		{

			
			if($_POST['otp']==$_SESSION['pin'])
			{
				//$flag=0
				$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$phoneno=$_POST['phoneno'];
			$password=$_POST['password'];
			
			$query="INSERT INTO `newuser`(`fname`, `lname`, `email`, `phone`, `password`) VALUES ('$fname','$lname','$email','$phoneno','$password')";
			try
			{	
				if(mysqli_query($conn,$query))
				{
					//$flag=1;
					$_SESSION["name"]=$row["fname"];
					header("location:login.php");
				}
				else
				{
					//$flag=2;
				}
				
			}catch(Exception $ex)
			{
				echo("error".$ex->getMessage());
			}
			}
			else
			{
				echo "<script>alert('Not found');</script>";
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
    <title>CleanZee | User Registration Page</title>
	<script>
		  $(document)
			.ready(function() {
			  $('.ui.form')
				.form({
				  fields: {
					fname: {
					  identifier  : 'fname',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please enter a your first name'
						}
					  ]
					},
					lname: {
					  identifier  : 'lname',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please enter a your last name'
						}
					  ]
					},
					email: {
					  identifier  : 'email',
					  rules: [
						{
						  type   : 'email',
						  prompt : 'Please enter a your valid email'
						}
					  ]
					},
					phoneno: {
					  identifier  : 'phoneno',
					  rules: [
						{
						  type   : 'length[10]',
						  prompt : 'Please enter a your 10 Digit mobile number'
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
					},
					  terms: {
						identifier: 'terms',
						rules: [
						  {
							type   : 'checked',
							prompt : 'You must agree to the terms and conditions'
						  }
						]
					  }
				  }
				})
			  ;
			})
		  ;
	</script>
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
			<div class="header"><center><img src="img\new-user.png">Create a new account</center></div>
			<form class="ui form segment" method="post" autocomplete="on">
			<div class="ui error message"></div>
				<div class="two fields">
					<div class="field">
						<label>First</label>
						<div class="ui input">
							<input type="text" id="fname" name="fname" value="<?php if(isset($_POST["fname"])){ echo $_POST["fname"]; } ?>" placeholder="Ex.john">
						</div>
					</div>
					<div class="field">
						<label>Last</label>
						<div class="ui input">
							<input id="lname" name="lname" type="text" value="<?php if(isset($_POST["lname"])){ echo $_POST["lname"]; } ?>" placeholder="Ex.Devircy">
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>Email</label>
						<input type="text" id="email" name="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; } ?>" placeholder="Ex.John@gmail.com">
					</div>
					<div class="field">
						<label>Phone</label>
						<div class="ui input">
							<input type="text" id="phoneno" name="phoneno" value="<?php if(isset($_POST["phoneno"])){ echo $_POST["phoneno"]; } ?>" placeholder="Ex.9221021193">
						</div>
					</div>	
				</div>
				<div class="two fields">
					<div class="field">
						<label>Password</label>
						<div class="ui input">
							<input type="password" id="password" name="password" value="<?php if(isset($_POST["password"])){ echo $_POST["password"]; } ?>" placeholder="Enter Strong password">
						</div>
					</div>
					<div class="field">
						<label>Confirm Password</label>
						<div class="ui input">
							<input type="password" id="confpassword" name="confpassword" onblur="checkpassword()" value="<?php if(isset($_POST["confpassword"])){ echo $_POST["confpassword"]; } ?>" placeholder="Re-enter Password" >
						</div>	
					</div>
				</div>
				<script type="text/javascript">
					function checkpassword()
					{
						if(document.getElementById('password').value != document.getElementById('confpassword').value)
						{
							alert("Please Enter Same Password In Both The Password Field");
						}
					}
				</script>
				  <div class="inline field">
					<div class="ui checkbox">
					  <input type="checkbox" name="terms" <?php if (isset($_POST['terms'])) echo 'checked'; ?>/>
					  <label>I agree to the terms and conditions &nbsp;<a href="Terms & Conditions.html">Terms & Conditions</a></label>
					</div>
				  </div>
				<center>
					<div>
						<input type="submit" name="submit1" id="mySubmit" value="Register" class="ui primary button">
						<!--<br>All ready have an account.!!<a href="login.php">&nbsp;click to signIn</a>-->
					</div>
					<div class="ui horizontal section divider" style="color: red">Please Enter Your OTP below in input box Once Received</div>
					<div>
						<input type="text" name="otp" style="width: 200px;"  placeholder="Enter OTP here">
						<input type="submit" name="otpbtn" value="Validate OTP" class="ui button">
					</div>
				</center>
			</form>
		</div>
		<!--end code-->
		<?php
			include 'inc\footer.php';
		?>
  </body>
</html>