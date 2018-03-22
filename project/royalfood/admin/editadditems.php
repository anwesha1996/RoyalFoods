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
      <div class="content-wrapper" >
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          <h1>
            EDIT MAIN ITEMS
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="admin_additems.php"></i>Add Items</a></li>
            <li class="active">Edit Main Items</li>
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
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <?php 
                        $query="select * from tbl_itemdetails where itemid='".$_GET['itemid']."'";
                        foreach ($conn->query($query) as $itm){
                    ?>
                  <h3 class="box-title">Edit Items Details</h3>
                 </div>
                  <form role="form" name="frmitem" method="post" action="edititems_code.php">
                  <div class="box-body">
                      
                    <div class="form-group">
                        <input type="hidden" id="itemid" name="itemid" value="<?php echo $itm['itemid'] ?>">
                        <input type="text" class="form-control" id="itemname" name="itemname" value="<?php echo $itm['itemname'] ?>" placeholder="Enter Items Name">
                    </div>
                    
                    
                    <div class="form-group">
                    <label>
                        <input type="radio"  name="itemtype" id="veg" value="Veg"  value="Male"  <?php echo ($itm['itemtype']=='Veg')?'checked':'' ?>>
                    </label>
                    <label>Veg</label>
                    <label >
                        <input type="radio"   name="itemtype" id="nonveg" value="Non-Veg" value="Male" <?php echo ($itm['itemtype']=='Non-Veg')?'checked':'' ?> >
                    </label>
                    <label>Non-Veg&nbsp;&nbsp;&nbsp;</label>
                    <label>
                        <input type="radio"  name="itemtype" id="drinks" value="Drinks" value="Male" <?php echo ($itm['itemtype']=='Drinks')?'checked':'' ?> >
                    </label>
                    <label>Drinks&nbsp;&nbsp;&nbsp;</label>
                  </div>
                  </div>
                 <!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" class="btn btn-success" onClick="return validateItem();">Update</button>
                    <a href="admin_additems.php"  type="submit" class="btn btn-danger" >Cancle</a> 
                  </div>
                </form>
                      
                        <?php } ?>
                
                </div>
                
          </section>
      
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

