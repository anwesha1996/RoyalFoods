
<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

  
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
                          ?>
          <a href="index.php"><b><?php echo $row['company_name']; ?></b>&nbsp;<i class="fa  fa-cutlery"></i></a>
          <?php } ?>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <div class="register-logo">
        <?php 
                    $query="select userimage from tbl_adminlogindetails ";
                    foreach ($conn->query($query) as $row){
                    ?>
        
          <img style="width: 128px; height: 128px;" src="userimage/<?php echo $row['userimage'] ?>" class="img-circle" alt="User Image" />
         <?php } ?>
     </div>
        <p class="login-box-msg">Admin Sign in</p>
        
            
            <form  name="loginform" action="adminlogin_Code.php" method="post" class="login-form">
            
          <div class="form-group has-feedback">
              <input type="text" class="form-control" id="form-username" name="formusername" id="formusername" placeholder="User name" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" class="form-control" id="form-password" name="formpassword" id="formpassword" placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <input type="submit" class="btn btn-primary btn-block btn-flat" onClick="return validation();" value="Sign In" />
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script type="text/javascript">
      function validation(){
          
          if(document.loginform.formusername.value === ''){
              alert('Please enter user name');
              return false;
          }
          
          if(document.loginform.formpassword.value === ''){
              alert('Please enter password');
              return false;
          }
      }
  </script>
  </body>
</html>

