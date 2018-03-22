
<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Sign Out</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

   
  </head>
  <body class="lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
           <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
                          ?>
          <a href="#"><b><?php echo $row['company_name']; ?></b>&nbsp;<i class="fa  fa-cutlery"></i></a>
          <?php } ?>
      </div>
        
        
      <!-- User name -->
      <?php 
          $query='select username from tbl_adminlogindetails';
          foreach ($conn->query($query) as $row){
              
          
          ?>
      <div class="lockscreen-name">
          <?php echo $row['username']; }?>
      </div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <?php 
                    $query="select userimage from tbl_adminlogindetails where userid='".$_SESSION['userid']."'";
                    foreach ($conn->query($query) as $row){
                    ?>
          <img src="../userimage/<?php echo $row['userimage'] ?>" alt="User Image" />
           <?php } ?>
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" role="form" name="loginform" action="../adminlogin_Code.php" method="post" class="login-form">
          <div class="input-group">
              <?php 
          $query1='select username from tbl_adminlogindetails';
          foreach ($conn->query($query1) as $itm){
          ?>
              <input type="hidden" name="formusername" value="<?php echo $itm['username'];?>">
          <?php } ?>
              <input type="password" class="form-control" name="formpassword" placeholder="password" />
            <div class="input-group-btn">
                <button  class="btn"><i class="fa fa-arrow-right text-muted" onClick="return validation();"></i></button>
            </div>
          </div>
        </form><!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Enter your password to retrieve your session
      </div>
      
      <div class="lockscreen-footer text-center">
        Copyright &copy; 2017 <br><b>Online Food Ordering System</b><br/>
        All rights reserved
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>

