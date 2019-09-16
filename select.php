<?php
	session_start();
		include 'inc\dbconn.php';
	$output='';
	if(isset($_POST["sid"]))
	{
		$_SESSION["demoid"] = $_POST["sid"];
		$query="SELECT * FROM timg WHERE id='".$_POST["sid"]."'";
		$result=mysqli_query($conn,$query);
		$output.='<div class="description">';
		while($row=mysqli_fetch_array($result))
		{
			$output.='
					<div class="ui header">'.$row['name'].'</div>
					  <h4 class="ui top attached block header">
					    Service Included
					  </h4>
					  <div class="ui attached segment">
					    <li>'.$row['des1'].'</li>
					    <li>'.$row['des2'].'</li>
					    <li>'.$row['des3'].'</li>
					    <li>'.$row['des4'].'</li>
					    <li>'.$row['des5'].'</li>
					    <li>'.$row['des6'].'</li>
					    <li>'.$row['des7'].'</li>
					    <li>'.$row['des8'].'</li>
					    <li>'.$row['des9'].'</li>
					    <li>'.$row['des10'].'</li>
					  </div>
					  <h4 class="ui attached block header">
					    Cleaning Solutions Used
					  </h4>
					  <div class="ui attached segment">
					    <li>'.$row['des11'].'</li>
					  </div>
					  <h4 class="ui attached block header">
					    Equipment Used
					  </h4>
					  <div class="ui attached segment">
					    <li>'.$row['des12'].'</li>
					    <li>'.$row['des13'].'</li>
					  </div>
					  <h4 class="ui attached block header">
					    Does Not Include
					  </h4>
					  <div class="ui attached segment">
					    <li>'.$row['des14'].'</li>
					    <li>'.$row['des15'].'</li>
					  </div>
				  </div>			
				';
		}
		$output.="</div>";
		echo $output;
	}
?>