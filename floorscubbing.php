<?php
	session_start();
	include 'inc\dbconn.php';
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
		<link rel="stylesheet" href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.js"></script>
		<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>
		<title>CleanZee | User Login Page</title>
		<script>
			  $(document).ready(function() {
				$('select,input[type=radio]').on('change',function(){
				var selVal=$('select option:selected').val(); //get the selected value from select
				var radVal=$('input[type=radio]:checked').val();//get the checked radio value
				$('.total').val(selVal*radVal) //multiply and display in a element or do whatever you want
			});
			  $('.ui.form').form({
				  fields: {
					housesizeradio: {
					  identifier  : 'housesizeradio',
					  rules: [
						{
						  type   : 'checked',
						  prompt : 'Please select house size'
						}
					  ]
					},
					Frequence: {
					  identifier  : 'Frequence',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please select Frequence'
						}
					  ]
					},
					Date: {
					  identifier  : 'Date',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please select Any one of the date'
						}
					  ]
					},
					time: {
					  identifier  : 'time',
					  rules: [
						{
						  type   : 'checked',
						  prompt : 'Please select Fix date or any conveniance Date'
						}
					  ]
					},
					realtime: {
					  identifier  : 'realtime',
					  rules: [
						{
						  type   : 'empty',
						  prompt : 'Please select time'
						}
					  ]
					}
				  }
				});
			});
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
		<div class="ui text container">
			<form class="ui large form" method="POST" autocomplete="off">	
			<div class="ui error message"></div>
			<?php
				$sid=$_SESSION["demoid"];
				$query="SELECT name from timg WHERE id='".$sid."'";
				$result=mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result))
				{
					echo '<h4 class="ui top attached block header">'.$row['name'].'</h4>';
					$sname=$row['name'];
				}
			?>
			<div class="ui bottom attached segment">
				<table cellpadding="7" align="center">
					<tr>
						<td><label id="lbl-for-size">Select House Size:</label></td>
						<td>
							<div id="house-size">
								<div class="inline fields">
									<div class="field">
										<div class="ui checkbox">
											<input type="radio" name="housesizeradio" value="399" >
											<label>RK</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox ">
											<input type="radio" name="housesizeradio" value="499">
											<label>1BHK</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox ">
											<input type="radio" name="housesizeradio" value="699">
											<label>2BHK</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox ">
											<input type="radio" name="housesizeradio"  value="799" >
											<label>3BHK</label>
										</div>
									</div>
									<div class="field">
										<div class="ui checkbox ">
											<input type="radio" name="housesizeradio" value="899">
											<label>4BHK</label>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td><label>Frequency:</label></td>
						<td>
							<select name="Frequence" class="ui dropdown" id="frequnce">
								<option value="1">Select Frequency</option>
								<option value="1">One Time</option>
								<option value="2">Half Yearly</option>
								<option value="3">Quarterly</option>
								<option value="10">Monthly</option>
							</select>
							<script type="text/javascript">
								$('#frequnce').dropdown({on:'hover'});
							</script>
						</td>
					</tr>
					<tr>
						<td>Total Price</td>
						<td>
							<div class="ui input">
								<input type="text" class="total"  value="₹0.00" readonly="readonly" name="tprice" size="22">
							</div>
						</td>
					</tr>						
					<tr>
						<td><label>Choose Date:</label></td>
						<td>
							<div class="ui calendar" id="getDate">
								<div class="ui input">
									<input type="text" name="Date" placeholder="Ex.12/04/2018" size="22">
								</div>
							</div>
						</td>
						<script type="text/javascript">
							var today = new Date();
							$('#getDate').calendar({
								  minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 0),
								  maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 90),
								  type:'date'
							});	
						</script>
					</tr>					
					<tr>
						<td><label>Your Convenience Time:</label></td>
						<td>
						<div class="inline fields">
							<div class="field">
							  <div class="ui radio checkbox">
								<input type="radio" name="time" value="fix" id="fix-time">
								<label>Approximate Time</label>
							  </div>
							</div>
							
							<div class="field">
							  <div class="ui radio checkbox">
								<input type="radio" name="time" value="any" id="any-time">
								<label>Any Convenience Time</label>
							  </div>
							</div>
						</div>
							<script>
								$(document).ready(function() 
								{
									$('input[type="radio"]').click(function() 
									{
										if($(this).attr('id') == 'fix-time') 
										{
											$('#lbl-time1').show(); 
											$('#time1').show();
											$('#lbl-time2').hide();           
											$('#time2').hide();
										}
										if($(this).attr('id') == 'any-time') 
										{
											$('#lbl-time2').show();           
											$('#time2').show();   
											$('#lbl-time1').hide(); 
											$('#time1').hide();
										}
									});
								});
							</script>
						</td>
					</tr>					
					<tr>
						<td><label id="lbl-time1" style="display:none">Select Time</label></td>
						<td>
							<div id="time1" style="display:none">
							  <div class="example3 ui calendar" style="display:inline" >
								<div class="ui input left icon">
								  <i class="time icon"></i>
								  <input type="text" name="realtime" placeholder="Time" size="3">
								</div>
							  </div>
							 </div>
						</td>
					</tr>
					<tr>
						<td><label id="lbl-time2" style="display:none">Select Time</label></td>
						<td>
							<div id="time2" style="display:none">
							  <div class="example3 ui calendar" style="display:inline" >
							  From
								<div class="ui input left icon">
								  <i class="time icon"></i>
								  <input type="text" name="realtime1" placeholder="Time" size="3">
								</div>
							  </div>
							  <div class="example3 ui calendar" style="display:inline">
							  To
								<div class="ui input left icon">
								  <i class="time icon"></i>
								  <input type="text" name="realtime2" placeholder="Time"  size="3">
								</div>
							  </div>
							  </div>
							  <script>
								$('.example3').calendar({
								  type: 'time'
								});
							  </script>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><br>
							<div class="fluid ui buttons">
								<input type="submit" name="add"  value="Add to Cart" class="positive ui button">
							</div>
						</td>
					</tr>
				</table>
			</div>
		</form>			
	</div>
	<?php
		if(isset($_POST["add"]))
		{
			 if(isset($_SESSION['name'])) 
			 {
				 if(isset($_POST["time"])) 
				 {
					if($_POST["time"]=="fix")
					{
						$housesizeradio=$_POST['housesizeradio'];
						$Frequence=$_POST['Frequence'];
						$tprice=$_POST['tprice'];
						$Date=$_POST['Date'];
						$realtime=$_POST['realtime'];
						$name=$_SESSION['name'];					
								
						$query="INSERT INTO `carttbl`(`userid`, `servicename`, `housesize`, `frequence`, `totalprice`, `date`, `time`) VALUES ('$name','$sname','$housesizeradio','$Frequence',$tprice,'$Date','$realtime')";
						try
						{	
							if(mysqli_query($conn,$query))
							{
								$query12="SELECT count(*) as data FROM `carttbl` WHERE userid='".$_SESSION['name']."'";
								try
								{	
									$result12=mysqli_query($conn,$query12);
								}catch(Exception $ex)
								{
									echo("error".$ex->getMessage());
								}
								$d=0;
								while($row=mysqli_fetch_array($result12))
								{
									$d=$row['data'];
								}
								?>
								<script>			
									document.getElementById("bag").innerHTML="<?php echo $d; ?>";
								</script>
								<?php
									if($row['data']==0)
									{
											echo "<script>document.getElementById('cartdata').innerHTML = 'Please Add Services in you Cart';</script>";
									}
							}
							else
							{
								echo "<script>document.getElementById('cartdata').innerHTML = 'Please Login to see cart data';</script>";
							}
						}catch(Exception $ex)
						{
							echo("error".$ex->getMessage());
						}
					}
					else if($_POST["time"]=="any")
					{
						$housesizeradio=$_POST['housesizeradio'];
						$Frequence=$_POST['Frequence'];
						$tprice=$_POST['tprice'];
						$Date=$_POST['Date'];
						$realtime1=$_POST['realtime1'];
						$realtime2=$_POST['realtime2'];
						$time=$realtime1.'-'.$realtime2; 
						$name=$_SESSION['name'];
						$query="INSERT INTO `carttbl`(`userid`, `housesize`, `frequence`, `totalprice`, `date`, `time`) VALUES ('$name','$housesizeradio','$Frequence',$tprice,'$Date','$time')";
						try
						{	
							if(mysqli_query($conn,$query))
							{											
								$query12="SELECT count(*) as data FROM `carttbl` WHERE userid='".$_SESSION['name']."'";
								try
								{	
									$result12=mysqli_query($conn,$query12);
								}catch(Exception $ex)
								{
									echo("error".$ex->getMessage());
								}
								$d=0;
								while($row=mysqli_fetch_array($result12))
								{
									$d=$row['data'];
								}
								?>
								<script>			
									document.getElementById("bag").innerHTML="<?php echo $d; ?>";
								</script>
								<?php
									//echo "<script>alert('Service successfully added into Your Cart');</script>";
							}
							else
							{
								echo "<script>alert('Error to add service into Cart');</script>";
							}
						}catch(Exception $ex)
						{
							echo("error".$ex->getMessage());
						}
					}
				 }
			 }
			 else 
			 {
				?>
				 <script>
					alert('Please Login Fisrt Before Add into Cart');
				   window.location.assign("login.php");
				 </script>
				 <?php
			 }
		}
		include 'inc\footer.php';
		?>
	</body>
</html>		