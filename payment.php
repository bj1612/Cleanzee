<?php
  include 'inc\dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
    <script  src="js/index.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.js"></script>
    <title>CleanZee | The Professional Home Service</title>
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
    session_start();
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
  <!--<div class="tips">
Payment card number: (4) VISA, (51 -> 55) MasterCard, (36-38-39) DinersClub, (34-37) American Express, (65) Discover, (5019) dankort
</div>-->
<div class="container">
  <div class="col2">
  <table class="ui fixed table">
  <thead>
      <tr>
      <th colspan="3"><center><h1>Pay By Internet Banking | Payment Getway..</h1></center></th>
  </tr>
    <tr>
      <th>Service Name</th>
      <th>Date</th>
      <th>Time</th>

  </tr>
</thead>
  <tbody>
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
                  <td>'.$row['date'].'</td>
                  <td>'.$row['time'].'</td>
                </tr>
    ';
  }
  ?>
  </tbody>
</table>


    <?php
      
      if($_SESSION['name'])
      {
          $query="SELECT sum(totalprice) as price FROM `carttbl` WHERE userid='".$_SESSION['name']."'";
        try
        { 
          $result=mysqli_query($conn,$query);

        }catch(Exception $ex)
        {
          echo("error".$ex->getMessage());
        }
        while($row=mysqli_fetch_array($result))
        {
       
          echo "<button type='submit' class='buy' onclick='myFunction()'><i class='material-icons'>lock</i> Pay ".$row['price']."</button>";
          $price=$row['price'];
        
        }
      }
    ?>
        <script type="text/javascript">
          var price=<?php echo $price; ?>;
          // var data="http://192.168.43.134:8088/gateway?amount="+price+"&acNo=1010130&redirect=http://localhost:8080/Cleanzee/invoice.php";

          var data="invoice.php";
function myFunction() {
  location.href=data;

    }
</script>
  </div>
</div>

</body>
</html>