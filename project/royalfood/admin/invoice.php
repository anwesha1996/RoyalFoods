<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                
                <?php 
                          $query1='select * from  tbl_companydetails';
                          foreach ($conn->query($query1) as $row){
                          ?>
                  
                  
                  
                <a href="#" class="navbar-brand"><b><?php echo $row['company_name']; ?></b>&nbsp;<i class="fa  fa-cutlery"></i></a>
                <?php } ?>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="admin_dashboard.php">Home <span class="sr-only">(current)</span></a></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mastry Entry<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                    <li><a href="admin_additems.php">Add Items</a></li>
                    <li class="divider"></li>
                    <li><a href="admin_addsubitems.php">Add Sub-Items</a></li>
                  </ul>
                </li>
              </ul>
              
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                 
                  <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="customerorder.php">
                      <i class="fa fa-gavel"></i>
                      <span class="label label-danger">9</span></a>
                    
                  </li>
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                      <?php 
                    $query2="select userimage from tbl_adminlogindetails where userid='".$_SESSION['userid']."'";
                    foreach ($conn->query($query2) as $row){
                    ?>
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="../userimage/<?php echo $row['userimage'] ?>" class="user-image" alt="User Image" />
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">Welcome Admin</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="../userimage/<?php echo $row['userimage'] ?>" class="img-circle" alt="User Image" />
                        <p>
                          Administrator
                          <?php 
                          $query3='select * from  tbl_companydetails';
                          foreach ($conn->query($query3) as $row){
                          ?>
                          <small><?php echo $row['company_name']; ?></small>
                          <?php } ?>
                        </p>
                    <?php } ?>
                        
                      </li>
                      
                      <li class="user-footer">
                        <div class="pull-left">
                            <a href="changepassword.php" class="btn btn-default btn-flat">Setting</a>
                        </div>
                        <div class="pull-right">
                            <a href="adminsignout.php" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper" >
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          <h1>
<!--            Invoice #007612-->
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">Invoice</li>
          </ol>
        </section>

          <!-- Main content -->
          <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa  fa-cutlery"></i>
<!--                Royal Foods-->
                         <?php 
                          $query4='select * from  tbl_companydetails';
                          foreach ($conn->query($query4) as $row){
                          ?>
                            <?php echo $row['company_name']; ?>
                          <?php } ?>

<?php
$query5="select * from tbl_customerdetails";
foreach ($conn->query($query5) as $itm){
?>
                <small class="pull-right">Date: <?php echo $itm['orderdate']  ?></small>
<?php } ?>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              
              From
            <address>
                 <?php 
                          $query6='select * from  tbl_companydetails';
                          foreach ($conn->query($query6) as $row){
                          ?>
                            
                         
              <strong><?php echo $row['company_name']; ?></strong><br>
              <?php echo $row['company_address']; ?><br>
              
              Phone: <?php echo $row['company_landline']; ?><br>
              Email: <?php echo $row['company_email']; ?>
               <?php } ?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
                <?php 
                          $query7="select * from  tbl_customerdetails where customerid=".$_GET['custid']."";
                          foreach ($conn->query($query7) as $row){
                          ?>
              <strong><?php echo $row['name']; ?></strong><br>
              <?php echo $row['address']; ?><br>
              
              Phone: (+91) <?php echo $row['mobileno']; ?><br>
              Email: <?php echo $row['emailid']; ?>
                          <?php } ?>
            </address>
          </div><!-- /.col -->
<!--            <div class="col-sm-4 invoice-col">
              <b>Invoice #007612</b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
            </div> /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                      <th>Serial #</th>
                      <th>Item</th>
                        <th>Quantity</th>
                    
                    
<!--                    <th>Description</th>-->
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $slno=0;
                        $query8="select * from tbl_subitemdetails inner join tbl_orderdetails on tbl_subitemdetails.subitemid=tbl_orderdetails.subitemid where customerid=".$_GET['custid']."";
                        foreach($conn->query($query8) as $itm){
                            $slno=$slno+1;
                        ?>
                  <tr>
                    <td><?php echo $slno; ?></td>
                    <td><?php echo $itm['subitemname']; ?></td>
                    <td><?php echo $itm['quantity']; ?></td>
                    
                    <td><?php echo $itm['price']; ?></td>
                  </tr>
                        <?php } ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
<!--              <p class="lead">Payment Methods:</p>
              <img src="../dist/img/credit/visa.png" alt="Visa">
              <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="../dist/img/credit/american-express.png" alt="American Express">
              <img src="../dist/img/credit/paypal2.png" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>-->
            </div><!-- /.col -->
            <div class="col-xs-6">
<!--              <p class="lead">Amount Due 2/22/2014</p>-->
              <div class="table-responsive">
                   <?php
                    
                        $query9="select distinct totalprice from tbl_orderdetails  where customerid=".$_GET['custid']."";
                        foreach($conn->query($query9) as $itm){
                            
                        ?>
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $itm['totalprice'] ?></td>
                  </tr>
<!--                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>-->
                  <tr>
                    <th>Shipping:</th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $itm['totalprice'] + 10 ; ?></td>
                  </tr>
                </table>
                        <?php } ?>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.php?custid=<?php echo $_GET['custid'] ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
    
     
    
    
    
    <script type="text/javascript">
        function setDeleteAction(){
            if(confirm("Are you sure want to delete these rows ?")){
                document.frmdelete.action="deletemultipleitem_code.php";
                document.frmdelete.submit();
            }
        }
        
        function validateItem(){
            var obj=document.frmitem;
            
            var itemname=obj.itemname.value;
            if(itemname===''){
                alert('Item Name is required');
                return false;
                itemname.focus();
            }
            if(document.frmitem.itemtype[0].checked==false && document.frmitem.itemtype[1].checked==false && document.frmitem.itemtype[2].checked==false){
                alert('Item Type is required');
                return false;
            }
        }
    </script>
  </body>
</html>

