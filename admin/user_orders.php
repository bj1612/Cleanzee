<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.js"></script>
    
</head>
<body>

<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
if(isset($_POST['email']))
    {
            
            
            $email='vikki2446@gmail.com';//put user emial address
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
            $mail->Body = "Hello, Your One Time Password(OTP) is ";
            $mail->addAddress($email);
            if(!$mail->send())
            {
                echo "<script>alert('Mail Successfully send ');</script>";
                
            }
            else
            {
              echo "<script>alert('Oops error');</script>";
              
            }
        
    }

//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');
//Get current page.
$page = filter_input(INPUT_GET, 'page');
//Per page limit for pagination.
$pagelimit = 20;

$db = getDbInstance();
if (!$page) {
    $page = 1;
}
$db = getDbInstance();
// select the columns
$select = array('id', 'userid', 'servicename', 'housesize', 'frequence', 'totalprice' ,'date');



//Set pagination limit
$db->pageLimit = $pagelimit;

//Get result of the query.
$customers = $db->arraybuilder()->paginate("carttbl", $page, $select);
$total_pages = $db->totalPages;
// get columns for order filter
foreach ($customers as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    //execute only once
    break;
}
include_once 'includes/header.php';
$stype='<script>document.write(x);</script>';
    $_SESSION["job"]=$stype;

?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Orders</h1>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>
        <form  method="POST">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">Sr No</th>
                <th>Name</th>
                <th>Service Name</th>
                <th>House Size</th>
                <th>Frequency</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Service Type</th>
                <th>Allocate To</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $row) : ?>
                <tr>
	                <td><?php echo $row['id'] ?></td>
	                <td><?php echo htmlspecialchars($row['userid']) ?></td>
	                <td><?php echo htmlspecialchars($row['servicename']) ?> </td>
                    <td><?php echo htmlspecialchars($row['housesize']) ?> </td>
                    <td><?php echo htmlspecialchars($row['frequence']) ?> </td>
                    <td><?php echo htmlspecialchars($row['totalprice']) ?> </td>
                    <td><?php echo htmlspecialchars($row['date']) ?> </td>
                    <td>
                        <select id="ddl" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
                            <option value=""></option>
                            <option value="Colours">Cleaner</option>
                            <option value="Shapes">Painter</option>
                            <option value="Names">Beautician</option>
                            
                        </select>
                    <td>
                        <select id="ddl2" onchange="getindex()">
                        </select> 
                    </td>
                          
                        <script type="text/javascript">
                         function configureDropDownLists(ddl1,ddl2) {
                        var colours = ['','Pawan Yadav', 'John Devisey'];
                        var shapes = ['','Sahil Singh', 'Sanket Pandey'];
                        var names = ['','jennifer Roslet', 'Jacquiline Farnandez'];
                        

                        switch (ddl1.value) {
                            case 'Colours':
                                ddl2.options.length = 0;
                                for (i = 0; i < colours.length; i++) {
                                    createOption(ddl2, colours[i], colours[i]);
                                }
                                break;
                            case 'Shapes':
                                ddl2.options.length = 0;
                            for (i = 0; i < shapes.length; i++) {
                                createOption(ddl2, shapes[i], shapes[i]);
                                }
                                break;
                            case 'Names':
                                ddl2.options.length = 0;
                                for (i = 0; i < names.length; i++) {
                                    createOption(ddl2, names[i], names[i]);
                                }
                                break;
                                default:
                                    ddl2.options.length = 0;
                                break;
                        }

                    }
                        function createOption(ddl, text, value) {
                            var opt = document.createElement('option');
                            opt.value = value;
                            opt.text = text;
                            ddl.options.add(opt);
                        }
                        function getindex()
                        {
                        var selectedValue=ddl2.value;
                        var selectedValue1=ddl.value;
                        
                        }
                    </script>
                    </td>
              
                    
                
                    <td>
                        
                            <button class="btn btn-danger delete_btn" type="submit" name="email" >
                                <span class="glyphicon glyphicon-envelope">
                            </button>
                        </form>
                        
                    </td>

				</tr>
                <div class="modal fade" id="confirm-delete-<?php echo $row['id'] ?>" role="dialog">
                <div class="modal-dialog">
                  
                  <!--
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Message</h4>
                        </div>
                        <div class="modal-body">
                      
                                <input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['id'] ?>">
                            
                          <p>Mail Successfully sended to the customer.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                        </div>
                      </div>-->
                  
                  
                </div>
            </div>
            <?php endforeach; ?>      
        </tbody>
    </table>
    </form>


   
<!--    Pagination links-->
    <div class="text-center">
        <?php
        if (!empty($_GET)) {
            //we must unset $_GET[page] if previously built by http_build_query function
            unset($_GET['page']);
            //to keep the query sting parameters intact while navigating to next/prev page,
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        //Show pagination links
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="customers.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <!--    Pagination links end-->

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>
</body>
</html>