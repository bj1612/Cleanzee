if(isset($_POST["del"]))
		{
			$query="DELETE FROM `carttbl` WHERE userid='".$_SESSION["name"]."' && totalprice='$pri' && time='$time' && date='$date'";
			$result=mysqli_query($conn,$query);			
			if(mysqli_query($conn, $query)){}
		}