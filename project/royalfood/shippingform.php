<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>
<?php 
  require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
  if(isset($_GET['action']) && $_GET['action']=="delete"){
      
      $pid=intval($_GET['id']);
      unset($_SESSION['cart_products1'][$pid]);
  }
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart_products1'][$id])){ 
             
            $_SESSION['cart_products1'][$id]['quantity']++; 
              
        }else{ 
              
            //$sql_s="SELECT * FROM products 
               // WHERE id_product={$id}"; 
            $sql_s="SELECT * FROM tbl_subitemdetails WHERE subitemid={$id}";
            //$query_s=mysql_query($sql_s);
            
            foreach ($conn->query($sql_s) as $row_s){
               $_SESSION['cart_products1'][$row_s['subitemid']]=array( 
                        "quantity" => $_SESSION['cart_products1'][$row_s]['quantity'], 
                        "itemprice" => $row_s['itemprice'],
                        "subitemimage"=> $row_s['subitemimage']
                    );  
            }
           
        } 
          
    }
    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Shipping Form</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    
    <!-- Bootstrap time Picker -->
    <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link href="plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .color-palette {
        height: 35px;
        line-height: 35px;
        text-align: center;
      }
      .color-palette-set {
        margin-bottom: 15px;
      }
      .color-palette span {
        display: none;
        font-size: 12px;
      }
      .color-palette:hover span {
        display: block;
      }
      .color-palette-box h4 {
        position: absolute;
        top: 100%;
        left: 25px;
        margin-top: -40px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        display: block;
        z-index: 7;
      }
    </style>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
                          ?>
          <!-- mini logo for sidebar mini 50x50 pixels -->
<!--          <span class="logo-mini"><b>A</b>LT</span>-->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $row['company_name']; ?></b></span>
           <?php } ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a  href="mycart.php" >
                  <i class="fa fa-cart-plus"></i>
                  <span class="label label-danger">
                      <?php 
                        if(isset($_SESSION['cart_products1'])){ 
                            
                            $sql="SELECT * FROM tbl_subitemdetails WHERE subitemid IN ("; 
          
                            foreach($_SESSION['cart_products1'] as $id => $value) { 
                                $sql.=$id.","; 
                                
                            } 
                             
                            $sql=substr($sql, 0, -1).") ORDER BY subitemname ASC";
                            
                        }
                        $cnt=0;
                        
                        
                        foreach ($conn->query($sql) as $itm){
                          $cnt++;  
                        }
                      ?>
                      <?php echo $cnt; ?>
                  </span>
                </a>
                </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                  <?php 
                    $query="select company_logo,company_name,company_service,company_landline,company_mobile from tbl_companydetails";
                    foreach ($conn->query($query) as $row){
                    ?>
                  
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="restaurantlogo/<?php echo $row['company_logo']; ?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs">Hi, Guest</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="restaurantlogo/<?php echo $row['company_logo']; ?>" class="img-circle" alt="User Image" />
                    
                            <p>
                      I Am Your - Web Waiter
                     
                          <small><?php echo $row['company_name']; ?></small>
                         
                    </p>
                     <?php } ?>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                   
                      <p style=" text-align: center"><b><i class="fa fa-phone"></i> Call : <?php echo $row['company_landline']; ?></br><i class="fa fa-mobile"></i> Mobile : +91-<?php echo $row['company_mobile']; ?></b></p>
                    
                    
                  </li>
                  <!-- Menu Footer-->
<!--                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>-->
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="restaurantlogo/<?php echo $row['company_logo']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $row['company_name']; ?></p>
              <a><?php echo $row['company_service']; ?></a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
        <?php
                $newquery="select itemname,itemid from tbl_itemdetails where itemstatus='Active'";
                foreach($conn->query($newquery) as $itm){
                    $itemid=$itm['itemid'];
              ?>
            <li class="treeview">
              <a href="#">
                  
                   <?php 
                          $query="select itemtype from tbl_itemdetails where itemid='".$itemid."'";
                          foreach ($conn->query($query) as $row){
                          ?>
                  <?php 
                              $itmtype= $row['itemtype'];
                              if($itmtype=='Veg'){
                          ?>
                <i class="fa fa-circle text-success"></i>
                 <?php } else if($itmtype=='Non-Veg'){ ?>
                 <i class="fa fa-circle text-danger"></i>
                  <?php } else if($itmtype=='Drinks'){ ?>
                 <i class="fa fa-circle text-info"></i>
                  <?php } ?>
                      <?php } ?>
                 
                 
                <span><?php echo $itm['itemname']; ?></span>
                 <?php 
                        $newquery3="select IFNULL(count(subitemid),0) as count from tbl_subitemdetails where subitemstatus='Active' and itemid='".$itemid."'";
                        foreach ($conn->query($newquery3) as $itm1){
                        ?>
                <span class="label label-primary pull-right"><?php echo $itm1['count']; ?></span>
                 <?php } ?>
                 
              </a>
              <ul class="treeview-menu">
                   <?php 
                        $newquery2="select * from tbl_subitemdetails where subitemstatus='Active' and itemid='".$itemid."'";
                        foreach ($conn->query($newquery2) as $itm1){
                        ?>
                <li><a><i class="fa fa-circle-o"></i><?php echo $itm1['subitemname']; ?> <span class="label label-primary pull-right"><?php echo $itm1['itemprice']; ?>/-</span></a></li>
                
                <?php } ?>
                </ul>
            </li>
                
                
             
            <?php } ?>
        </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

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
<!--                    <div class="clearfix">
                  <a  href="mycart.php" class="btn btn-sm btn-danger btn-flat pull-right" style="width:100%; margin-top:-10px">BACK TO MY CART</a>
                  
                </div>-->
                   <a href="mycart.php" class="btn btn-block btn-social btn-bitbucket" style=" margin-top:-10px">
                    <i class="fa fa-arrow-circle-left"></i> BACK TO MY ORDERS CART
                  </a>
        
        <div class="box box-success" style="margin-top:5px">
            <form role="form" name="frmcust" method="post" action="shippingform_Code.php">
                <input type="hidden" name="totalprice" value="<?php echo $_GET['totalprice'] ?>"
                <div class="box-body">
                 
                    
                    <div class="box-body">
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color:rosybrown" class="fa fa-gavel"></i> </span>
                    <?php
                                $query="select IFNULL(MAX(customerid),0) as customerid from tbl_customerdetails";
                                foreach ($conn->query($query) as $id){
                                    $oldid=$id['customerid'];
                                    
                                    $newid=$oldid+1;
                                }
                               ?>
<!--                    <input type="text" style=" font-weight: bold;" class="form-control" placeholder="Order Id :<?php echo $newid; ?>" disabled>-->
                    <span  class="form-control" >ORDER No:<?php echo $newid; ?></span>
                  </div>
                        <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color: teal" class="fa  fa-inr"></i> </span>
                    <span  class="form-control" ><?php echo $_GET['totalprice'].'.00' ?></span>
                    <span class="input-group-addon">INR</span>
                  </div>
                        <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color: tomato" class="fa  fa-user"></i> </span>
                    <input type="text"  class="form-control" name="name" placeholder="Enter Name" required>
                 </div>
                       
                 <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color: olive" class="fa  fa-envelope"></i> </span>
                    <input type="text"  class="form-control" name="emailid" placeholder="Enter Email" required>
                 </div>  
                 
                 
                 
                 <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color: mediumslateblue" class="fa  fa-mobile"></i> </span>
                    <!--<input type="text" maxlength="10" pattern="\d{10}"  class="form-control" name="mobileno" placeholder="Enter Mobile No." required>-->
                 <input type="text" class="form-control" name="mobileno" required=""  placeholder="Enter Mobile No." data-inputmask='"mask": "999-999-9999"' data-mask />


                  </div> 
                 
                 <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color:darkred" class="fa fa-map-marker"></i> </span>
                    <div class="form-group" >
                    
                        <select  class="form-control select1" name="city" id="city" >
                         
                         <option value="Bhubaneswar">Bhubaneswar</option>
                      
                    </select>
                  </div>
                 </div>
                 
                   <br/>
                   <div class="input-group">
                       <span class="input-group-addon"><i style="color:red" class="fa fa-building"></i> </span>
                       <input type="text"  class="form-control" name="address" placeholder="Delivery Address" required="">
                 </div> 
                   <br>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color:darkorchid" class="fa fa-dot-circle-o "></i> </span>
                    <div class="form-group" >
                    <select  class="form-control select1" name="area" id="area" >
                        <option value="Sahid Nager">Sahid Nager</option>
                    </select>
                  </div>
                 </div>
                   
                   <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i style="color: mediumvioletred" class="fa fa-street-view"></i> </span>
                    <input type="text"  class="form-control" name="landmark" placeholder="Landmark" required>
                 </div> 
                   
                   <br/>
                   
                   <div class="form-group">
                     <div class="input-group">
                      <div class="input-group-addon">
                        <i style="color: seagreen"class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;Delivery Date
                      </div>
                         <input type="text" class="form-control" required="" name="deliverydate" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask />
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

              <div class="bootstrap-timepicker">
                    <div class="form-group">
                       <div class="input-group">
                           <div class="input-group-addon">
                          <i style="color: dodgerblue" class="fa fa-clock-o "></i>&nbsp;&nbsp;&nbsp;Delivery Time
                        </div>
                           <input type="text" class="form-control timepicker" required="" name="deliverytime" />
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>



                   
                    
                </div><!-- /.box-body -->
<!--                <button type="submit" class="btn btn-success" onClick="return validateItem();">Submit</button>-->
                </div><!-- /.box-body -->
                <div class="clearfix">
<!--                  <a  href="ordercomplite.php" class="btn btn-sm btn-success btn-flat pull-right" style="width:100%; margin-top:-10px">PAY CASH ON DELHIVERY</a>-->
                  <button type="submit" class="btn btn-sm btn-success btn-flat pull-right" style="width:100%; margin-top:-10px" onClick="return validateItem();">Submit</button>
                </div>
                </form>
                 </section>     
              </div><!-- /.box-header -->
               
                
                
                
                
                
              </div>
          
        </section><!-- /.content -->
        
        
        
      </div><!-- /.content-wrapper -->
      
      
    
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
         <strong>Copyright &copy; 2018 , All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            
          </div>
          </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      
    </div><!-- ./wrapper -->

       <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
       <!-- Page script -->
    <script type="text/javascript">
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
