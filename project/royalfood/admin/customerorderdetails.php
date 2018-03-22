<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Customer Details</title>
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

    
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-blue layout-top-nav">
    <div class="wrapper">

      <?php 
        include 'header.php';
      ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          <h1>
            Customer & Order Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer & Order Details</li>
          </ol>
        </section>

          <!-- Main content -->
         <section class="content">
              <?php
              if(isset($_SESSION['warningmessage'])){
              ?>
            <div class="callout callout-info">
              <h4>Warning!</h4>
              <p>
                  <?php
                  echo $_SESSION['warningmessage'];
                  unset($_SESSION['warningmessage']);
                  ?>
              </p>
            </div>
              <?php } ?>
              
              <?php
              if(isset($_SESSION['errormessage'])){
              ?>
            <div class="callout callout-danger">
              <h4>Error!</h4>
              <p>
                  <?php
                  echo $_SESSION['errormessage'];
                  unset($_SESSION['errormessages']);
                  ?>
              </p>
            </div>
              <?php } ?>
              <?php
              if(isset($_SESSION['successmessage'])){
              ?>
            <div class="callout callout-success">
              <h4>Success!</h4>
              <p>
                  <?php
                  
                  echo $_SESSION['successmessage'];
                  unset($_SESSION['successmessage']);
                  ?>
              </p>
            </div>
              <?php } ?>
            <div class="row">
            <div class="col-md-6">
              <div class="box box-success box-solid" >
                <div class="box-header with-border">
                  <h3 class="box-title">Customer Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                   <?php
                   $query="select * from tbl_customerdetails where customerid='".$_GET['customerid']."'";
                   foreach ($conn->query($query) as $row){
                   ?>
                    <tr>
                      
                      <th>Name</th>
                      <td><?php echo $row['name']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Email Id.</th>
                      <td><?php echo $row['emailid']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Mobile No.</th>
                      <td><?php echo $row['mobileno']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Address</th>
                      <td><?php echo $row['address']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Area</th>
                      <td><?php echo $row['area']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Landmark</th>
                      <td><?php echo $row['landmark']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Delivery Date</th>
                      <td><?php echo $row['delhiverydate']; ?></td>
                    </tr>
                    
                    <tr>
                      
                      <th>Delivery time</th>
                      <td><?php echo $row['delhiverytime']; ?></td>
                    </tr>
                   <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="box box-warning box-solid" >
                <div class="box-header">
                  <h3 class="box-title">Ordering Details</h3>
                  <div class="box-tools">
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                   
                  <table class="table">
                       
                   
                    <thead>
                      <th style="width: 10px">sl no.</th>
                      <th>Order Item</th>
                      <th>Qnty.</th>
                      <th>Amount</th>
                      
                    </thead>
                    <tbody>
                        <?php $slno=0 ?>
                         <?php
                    $newquery="select tbl_subitemdetails.subitemname,tbl_orderdetails.quantity,"
                            . "tbl_orderdetails.price,tbl_orderdetails.totalprice,"
                            . "tbl_subitemdetails.subitemid,tbl_orderdetails.customerid "
                            . "from tbl_orderdetails INNER JOIN tbl_subitemdetails on "
                            . "tbl_orderdetails.subitemid=tbl_subitemdetails.subitemid where tbl_orderdetails.customerid='".$_GET['customerid']."'";
                    foreach ($conn->query($newquery) as $itm){
                    
                    ?>
                    <tr>
                      <td><?php echo ++$slno; ?></td>
                      <td><?php echo $itm['subitemname']; ?></td>
                      <td><?php echo $itm['quantity']; ?></td>
                      <td><?php echo $itm['price']; ?></td>
                    </tr><?php } ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <th style="float:right">Total</th>
                      <td><?php echo $itm['totalprice']; ?>/-</td>
                    </tr>
                    </tbody>
                    
                  </table>
                   
                </div><!-- /.box-body -->
                
                <div class="box-footer">
                       
                       <a href="invoice.php?custid=<?php echo $_GET['customerid']; ?>"  type="submit" class="btn btn-info" >Generate Bill</a>
                       <a href="customerorder.php"  type="submit" class="btn btn-danger" >Back</a>
                  </div>
                
              </div><!-- /.box -->
              
             </div>   
              </section>

      
           </div>
         </div>
      </div>
      
      

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
  </body>
</html>



