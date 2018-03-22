<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System| Add Items</title>
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
   
    <style type="text/css">
    	 .select-wrapper {
		  background: url(../dist/img/camera.jpg) no-repeat;
		  background-size: cover;
		  display: block;
		  position: relative;
		  width: 16px;
		  height: 16px;
		  text-align:center;
		  margin-left:115px;
		}
		#image_src {
		  width: 16px;
		  height: 16px;
		 
		  opacity: 0;
		  filter: alpha(opacity=0); /* IE 5-7 */
		}
    </style>
    
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
            ORDER REPORT
            <small>Easily Managed Searching</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Order Report</li>
          </ol>
        </section>

          <!-- Main content -->
          <section class="content">
              <?php
              if(isset($_SESSION['warningmessage'])){
              ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i>Warning!</h4>
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
            <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
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
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
              <p>
                  <?php
                  
                  echo $_SESSION['successmessage'];
                  unset($_SESSION['successmessage']);
                  ?>
              </p>
            </div>
              <?php } ?>
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Search</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                 </div>
                
                  <form role="frmreport" name="frmreport" method="get">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="form-group">
                        <input type="date" class="form-control" id="fromdate" name="fromdate" placeholder="Enter From Datee">
                      </div>
                        
                      <div class="form-group">
                        <input type="date" class="form-control" id="todate" name="todate" placeholder="Enter To Datee">
                      </div>
                    
                    <div class="form-group">
                    <label>
                        <input type="radio" name="ordertype" id="new" value="New" class="flat-red"  />
                    </label>
                        <label>New</label> &nbsp;&nbsp;&nbsp;
                    <label>
                        <input type="radio" name="ordertype" id="delivered" value="Delivered" class="minimal-red"  />
                    </label>
                    <label>Delivered</label>
                    
                  </div>
                  </div>
                 <!-- /.box-body -->

                  
                      <button type="submit" class="btn btn-success" onClick="return validateItem();">Submit</button>
                  
                
                      
                  
                </div><!-- /.box-header -->
                  </form>
                </div>
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
                          <th>Price</th>
                        </tr>
                      </thead>
                      <?php
                         
                        if(isset($_GET['fromdate']) && $_GET['fromdate']!='' && isset($_GET['todate']) && $_GET['todate']!='' && isset($_GET['ordertype'])){
                        ?>
                      <tbody>
                          <?php $i=0; ?>
                            <?php
                              $query="select * from tbl_customerdetails where orderdate between '".$_GET['fromdate']."' and '".$_GET['todate']."' and customerstatus='".$_GET['ordertype']."' order by customerid desc";
                              
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
                          
                        <td>
                            <?php   
                            $totprice=0;
                                $pquery="select totalprice from tbl_orderdetails where customerid='".$row['customerid']."'";
                                foreach ($conn->query($pquery) as $ptm){
                                    $totprice=$ptm['totalprice'];
                                }
                            ?>
                            RS <?php echo $totprice; ?> /-
                        </td>
                        </tr>
                         <?php } ?>
                      </tbody>
                        <?php } ?>
                    </table>
                        
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">

                </div><!-- /.box-footer -->
                    </form>
              </div>
          </section>
      
           </div>
         </div>
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
    
    
   
    <!-- Select2 -->
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="..plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="..plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    
    <!-- bootstrap time picker -->
    
    
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
   
    
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>

