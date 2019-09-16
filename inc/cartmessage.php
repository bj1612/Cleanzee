if($_SESSION['name'])
{
	?>
	<script>
		document.getElementById("username").innerHTML="<?php echo $_SESSION['name']; ?>"
		document.getElementById("login").classList.add('MyClass');
		document.getElementById("signup").classList.add('MyClass1');
		document.getElementById("logout").style.display = "inline";
		
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
			</script>
		<?php						
	}
	if($row['data']==0)
	{
			echo "<script>document.getElementById('cartdata').innerHTML = 'Please Add Services in you Cart';</script>";
	}
}
else
{
echo "<script>document.getElementById('cartdata').innerHTML = 'Please Login to see cart data';</script>";
}