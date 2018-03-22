<?php 
  require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
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
                  <span class="label label-danger" id="cart-info">
                    <?php 
                        if(isset($_SESSION["cart_products1"])){
                                echo count($_SESSION["cart_products1"]); 
                        }else{
                                echo 0; 
                        }
                    ?>
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
             <!-- BANNER START -->
          <div class="row">
            
            <div class="col-md-6" style="width:100%;">
              <div class="box box-solid">
                
                <div class="box-body">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                       <?php
                            $imgquery1='select * from tbl_companybanner where company_bannerid=1';
                            foreach ($conn->query($imgquery1) as $imgrow1)
                            {
                        ?> 
                      <div class="item active">
                          
<!--                          <img src="dist/img/1400x600_1.jpg" alt="First slide">-->
                          <img  src="restaurantbanner/<?php echo $imgrow1['company_banner']; ?>" alt="First slide" />
                        <div class="carousel-caption">
<!-- First Slide-->
                        </div>
                           
                      </div>
                        <?php } ?>
                        <!--BANNER_2-->
                <?php
                            $imgquery2='select * from tbl_companybanner where company_bannerid=2';
                            foreach ($conn->query($imgquery2) as $imgrow2)
                            {
                        ?>
                      <div class="item">
                        <img src="restaurantbanner/<?php echo $imgrow2['company_banner']; ?>" alt="Banner-1" />
                        <div class="carousel-caption">
<!-- Second Slide-->
                        </div>
                      </div>
                        <?php } ?>
                        <!--BANNER_3-->
                <?php
                            $imgquery3='select * from tbl_companybanner where company_bannerid=3';
                            foreach ($conn->query($imgquery3) as $imgrow3)
                            {
                        ?>
                      <div class="item">
                            <img src="restaurantbanner/<?php echo $imgrow3['company_banner']; ?>" alt="Banner-1" />
                        <div class="carousel-caption">
<!--Third Slide-->
                        </div>
                      </div>
                        <?php } ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->  
           <!-- BANNER END -->  
             
                <div class="row" >
				  <?php
                    $newquery="select itemname,itemid from tbl_itemdetails where itemstatus='Active'";
                    foreach($conn->query($newquery) as $itm){
                        $itemid=$itm['itemid'];
                  ?>
              		  
           <div class="col-md-3" style="width:100%; margin-top:-8px">
              <div class="box box-warning box-solid collapsed-box" >
                <div class="box-header with-border">
                  <h3 class="box-title" ><?php echo $itm['itemname']; ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                   
                    <ul class="products-list product-list-in-box">
                        <?php 
                        $newquery5="select IFNULL(count(subitemid),0) as count from tbl_subitemdetails where subitemstatus='Active' and itemid='".$itemid."'";
                        foreach ($conn->query($newquery5) as $itm2){
                        ?>
                        <span class="label label-primary"><?php echo $itm2['count']; ?> Items Found</span>
                 <?php } ?>
                   <?php 
                        $newquery2="select * from tbl_subitemdetails where subitemstatus='Active' and itemid='".$itemid."'";
                        foreach ($conn->query($newquery2) as $itm1){
                        ?>
                        <form id="frmsubitem" name="frmsubitem" method="post" action="cart_update.php">
                    <li class="item" style="margin-top:5px;">
                      <div class="product-img">
                          <img src="subitemimage/<?php echo $itm1['subitemimage']; ?>" style="margin-left:-5px"  class="img-circle" alt="Product Image" />
                      </div>
                         
                        
                    <div class="product-info">
                            <a class="users-list-name" style="margin-left:-6px;"><?php echo $itm1['subitemname']; ?></a>

                           <select class="form-control select2" style=" font-size:12px;width:64px; height:30px; margin-left:-6px" name="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                          </select>

                         <span class="label label-success pull-right" style="margin-top:-26px; margin-right:-5px; font-size:17px"><i class="fa fa-rupee"></i><?php echo $itm1['itemprice']; ?></span>
                         
                         <input type="hidden" name="subitemid" value="<?php echo $itm1['subitemid']; ?>">
                     
                         <input type="submit" name="submit" id="submit" value="Add" class="btn bg-maroon margin pull-right" style=" font-size:10px; margin-top: -26px;margin-right: 60px "/>

                    </div>
                        
                    </li><!-- /.item -->
                    </form>
                    
                   <?php } ?>
           
                  </ul>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
                <?php } ?>
            
          </div>
            
        </section><!-- /.content -->
        
        
        
      </div><!-- /.content-wrapper -->
      
      
    
      <footer class="main-footer">
<!--        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>-->
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
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
