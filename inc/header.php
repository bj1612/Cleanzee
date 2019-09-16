<?php
	include 'inc\dbconn.php';
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
	<a class="navbar-brand" href="index.php">
		<img src="img\cleanzeelogo.png" height="35px" width="35px" alt="Logo">
	</a>
	<span class="vertical-line"></span>
	<a class="navbar-brand" href="index.php">CleanZee</a>
	<div id ="seach_input" class="ui search">
		<div class="ui icon input">
			<input class="prompt" type="text" placeholder="Search Services">
			<i class="search icon"></i>
		</div>
		<div class="results"></div>
	</div>
	<ul class="navbar-nav ml-auto">
		<script type="text/javascript">
			var content =[
					  { title: 'Cleaning', url: 'homecleaning.php' },
					  { title: 'Deep Home Cleaning', url: 'deephomecleaning.php' },
					  { title: 'Furniture Polishing and Cleaning', url: 'furniturepolishing.php' },
					  { title: 'Manual Cleaning', url: 'manualcleaning.php' },
					  { title: 'Floor Scubbing', url: 'floorscubbing.php' }
					];
			$('.ui.search').search({ source: content, searchFullText: false });
		</script>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="username" role="button" aria-haspopup="true" aria-expanded="false" style=" cursor: pointer;" ><i class="fa fa-user-circle"></i>&nbsp;|&nbsp;My Account</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="login.php" id="login"><i class="fa fa-user"></i>Sign In</a>
				<a class="dropdown-item" href="registration.php" id="signup"><i class="fa fa-user-plus"></i>Sign Up</a>
				<a class="dropdown-item" href="logout.php" id="logout" style="display:none;"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</li>
		<li class="nav-item">
			<a class="cartmodal nav-link"><i class="fa fa-shopping-cart fa-lg"></i> <span class="badge badge-light" id="bag">0</span></a>
		</li>
	</ul>
</nav>

<div class="ui small basic test modal" >
    <div class="ui icon header">
      <i class="archive icon"></i>
      Services in your's Cart
    </div>
    <div class="content" id="cartdata" style="margin-top:-30px;">
     	<table class="ui compact celled definition table">
  		<thead>
		    <tr>
		      <th><b>Service Name</b></th>
		      <th>Price</th>
		      <th>Date</th>
		      <th>Time</th>
			  <th></th>
		    </tr>
  		</thead>
  		<tbody>
			<form method="post">
  			<?php
				$query="SELECT * FROM carttbl WHERE userid='".$_SESSION["name"]."'";
				$result=mysqli_query($conn,$query);
				$pri=0;
				$time=0;
				$date=0;
				while($row=mysqli_fetch_array($result))
				{
					echo ' 
						  <tr>
							  <td>'.$row['servicename'].'</td>
							  <td>'.$row['totalprice'].'</td>				  
							  <td>'.$row['date'].'</td>				  
							  <td>'.$row['time'].'</td>				  
							  <td class="collapsing">
								<div class="ui input">
								
								  <input type="submit" value="Delete" name="del">
								 </div>
							  </td>
							</tr>
						';
						$pri=$row['totalprice'];
						$date=$row['date'];
						$time=$row['time'];
				}	
				if(isset($_POST["del"]))
				{
					$query="DELETE FROM `carttbl` WHERE userid='".$_SESSION["name"]."' && totalprice='$pri' && time='$time' && date='$date'";
					$result=mysqli_query($conn,$query);			
					if(mysqli_query($conn, $query)){}
					?>
					<script>$("#cartdata").load(location.href + " #cartdata");
					</script>
					<?php
				}
			?>
			</form>
  		</tbody>
	  </table>
    </div>
    <form action="shippingaddress.php" method="post">
    <div class="actions">
    	<center>
      <div class="ui red basic cancel inverted button" style="display: none;" id="modelcancelbtn">
        <i class="remove icon"></i>
        Cancel
      </div>
      <input type="submit" class="ui green ok inverted button" value="Checkout" style="display: none;" id="modelcheckoutbtn">
      </center>
    </div> 
	</form>
 </div>
<script>
	$('.ui.basic.modal').modal('attach events', '.cartmodal', 'show');
	//$('.ui.basic.modal').modal({observeChanges: true});
</script>