<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Customer Orders</title>
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
            CUSTOMER'S ORDERS
            <small>Easily Managed Customer's Orders </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer's Orders</li>
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
                  unset($_SESSION['errormessage']);
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
            <div class="box box-success box-solid" >
                    <form name="frmdelete" id="frmdelete" method="post" action="#">
                <div class="box-header with-border">
                  <h3 class="box-title">Custamer's Order Details</h3>
                  <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
                        <div class="box-body" >
                
                  <div class="table-responsive" style="height:400px">
                      
                      
                    <table class="table no-margin"  >
                      <thead>
                        <tr>
                        
                          <th>Sl. No.</th>
                          <th>Customer's Name</th>
                          <th>Mobile No.</th>
                          <th>Address</th>
                          <th>Area</th>
                          <th>Status</th>
                          <th>Order Date</th>
                          <th>Time</th>
                          <th>Deliver Date</th>
                          <th>Time</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php $i=0; ?>
                            <?php
                              $query="select * from tbl_customerdetails where customerstatus='Delivered' order by customerid desc";
                              foreach ($conn->query($query) as $row){
                            ?>
                        <tr>
                       <td><?php echo ++$i; ?></td>
                       <td><?php echo $row['name']; ?> </td>
                       <td><?php echo $row['mobileno']; ?></td>
                       <td><?php echo $row['address']; ?></td>
                       <td><?php echo $row['area']; ?></td>
                       <td><a class="label label-danger"></i><?php echo $row['customerstatus']; ?></a></td>
                       <td><?php echo $row['orderdate']; ?></td>
                       <td><?php echo $row['ordertime']; ?></td>
                          
                        <td><?php echo $row['delhiverydate']; ?></td>
                        <td><?php echo $row['delhiverytime']; ?></td>
                          
                          
                        </tr>
                         <?php } ?>
                      </tbody>
                    </table>
                        
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                
                
             
                
                
                <div class="box-footer clearfix">
<!--                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Remove Select Items</a>-->
<!--<input type="submit" value="Remove Select Items" id="delete" name="delete" class="btn btn-sm btn-info btn-flat pull-left" onClick="setDeleteAction();">-->
<!--                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>-->
                </div><!-- /.box-footer -->
                    </form>
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



