<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Edit Items</title>
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
<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                
                <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
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
                    $query="select userimage from tbl_adminlogindetails where userid='".$_SESSION['userid']."'";
                    foreach ($conn->query($query) as $row){
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
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
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
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          <h1>
            EDIT SUB ITEMS
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Sub Items</li>
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
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Sub-Items Details</h3>
                  </div>
                 <?php 
                    $query="SELECT tbl_itemdetails.itemname,tbl_itemdetails.itemtype, "
                            . "tbl_subitemdetails.subitemname,tbl_subitemdetails.itemprice, "
                            . "tbl_subitemdetails.subitemimage,tbl_subitemdetails.subitemstatus,"
                            . "tbl_subitemdetails.itemid,tbl_subitemdetails.subitemid "
                            . "FROM tbl_subitemdetails INNER JOIN tbl_itemdetails ON "
                            . "tbl_subitemdetails.itemid = tbl_itemdetails.itemid where subitemid='".$_GET['subitemid']."'";
                    foreach ($conn->query($query) as $row){
                        
                 ?>
                  <form role="form" name="frmitem" method="post" id="frmitem" action="editsubitem_code.php" enctype="multipart/form-data">
                        
                        
                  <div class="box-body">
                  <div class="form-group" >
                    
                    <select class="form-control select2" name="itemname" id="itemname">
                        <option value="">Select Item</option>
                      <?php
                            
                            $ires = 'select itemid,itemname from tbl_itemdetails';
                            foreach ($conn->query($ires) as $itm) {
                                ?>
                                
                                <option <?php echo ($row['itemid'] == $itm['itemid'] ? ' selected="selected"' : ''); ?> value="<?php echo $itm['itemid']; ?>"><?php echo $itm['itemname']; ?></option>
                            <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                    <div class="form-group" >
                        <input type="hidden" id="subitemid" name="subitemid" value="<?php print $row['subitemid']; ?>">
                        <input type="text" class="form-control" id="subitemname" name="subitemname" placeholder="Enter Items Name" value="<?php echo $row['subitemname']; ?>">
                    </div>
                    <div class="form-group" >
                     
                        <input type="text" class="form-control" id="itemprice" name="itemprice" placeholder="Enter Price" value="<?php echo $row['itemprice']; ?>" onKeyPress="return validate(event);">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Image Upload</label>
                      <input type="file" id="uploadimage" name="uploadimage">
                      <p class="help-block">image size (50X50) .jpg or .png</p>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" class="btn btn-warning" onClick="return validateItem();">Update</button>
                      <a href="admin_addsubitems.php"  type="submit" class="btn btn-danger" >Cancle</a>
                  </div>
                </form>
                      
                    <?php } ?>
                
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
    <script type="text/javascript">
         //Function to allow only numbers to textbox
         function validate(key) {
             //getting key code of pressed key
             var keycode = (key.which) ? key.which : key.keyCode;

             //comparing pressed keycodes
             if (!(keycode == 8 || keycode == 46) && (keycode < 48 || keycode > 57)) {
                 return false;
             }

             return true;
         }
        
</script>
  </body>
</html>

