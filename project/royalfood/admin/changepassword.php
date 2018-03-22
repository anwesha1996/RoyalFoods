<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Settings</title>
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
 <style type="text/css">
    	 .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
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
            ADMIN SETTING
            <small>Managed Admin Control</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
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
            <div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                  </div>
                 
                  <form role="form" id="frmchangepassword" name="frmchangepassword" method="post" action="changepassword_code.php">
                        
                        
                  <div class="box-body">
                  
                    
                    <div class="form-group" >
                     
                      <input type="password" class="form-control" id="itemprice" name="oldpassword" placeholder="Enter Old Password">
                    </div>
                  <div class="form-group" >
                     
                      <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password">
                    </div
                    ><div class="form-group" >
                     
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Confirm Password">
                    </div
                    
                    
                  ></div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" class="btn btn-success" onClick="return validateItem();"> Update</button>
                      <a href="admin_dashboard.php"  type="submit" class="btn btn-danger" >Cancle</a>
                      
                  </div>
                </form>
                      
                  
                
                </div>
               
                 <div class="box box-warning collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Profile Image</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                  </div>
              <div class="box-body">
                  <!-- Profile Image -->
                    <div class="box-body box-profile" >
                    <?php 
                    $query="select userimage from tbl_adminlogindetails where userid='".$_SESSION['userid']."'";
                    foreach ($conn->query($query) as $row){
                    ?>
                    <form action="upload_code.php" method="POST"  enctype="multipart/form-data">
                        <img style="display:block; margin-left:auto; margin-right:auto; width:128px; height: 128px"  class="profile-user-img img-responsive img-circle" src="../userimage/<?php echo $row['userimage'] ?>" alt="User profile picture">
                  <h3 class="profile-username text-center">Administrator</h3>
                  <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
                          ?>
                  <p class="text-muted text-center" ><?php echo $row['company_name']; ?></p>
                  
                  <?php } ?>

                   <div class="fileUpload btn btn-primary "  >
    <b>Browse</b>
    <input style=" margin-left:auto; margin-right:auto;" type="file" class="upload" id="uploadimage" name="uploadimage"  />
    
</div>

<button   type="submit" class="btn btn-success " ><b>Update</b></button>

                    </form>
                    <?php } ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
             </div>
             
             <div class="box box-success collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"> Edit Restaurant Profile </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                  </div>
                 
                 <form role="form" name="frmitem" method="post" id="frmitem" action="restaurantprofile_code.php" enctype="multipart/form-data">
              <div class="box-body">
                  <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
                          ?>
                  
                    <div class="form-group" >
                        <label><span class="glyphicon glyphicon-cutlery"></span> Restaurant Name</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Restaurant Name" value="<?php echo $row['company_name']; ?>">
                    </div>
                  
                  <div class="form-group" >
                      <label><span class="glyphicon glyphicon-map-marker"></span> Address</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter Address" value="<?php echo $row['company_address']; ?>">
                    </div>
                  <div class="form-group" >
                      <label><span class="glyphicon glyphicon-envelope"></span> Email Id</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_email" name="company_email" placeholder="Enter Email Id" value="<?php echo $row['company_email']; ?>">
                    </div>
                  <div class="form-group" >
                      <label><span class="glyphicon glyphicon-phone"></span> Mobile No.</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_mobile" name="company_mobile" placeholder="Enter Mobile No." value="<?php echo $row['company_mobile']; ?>">
                    </div>
                  <div class="form-group" >
                      <label><span class="glyphicon glyphicon-phone-alt"></span> Landline No.</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_landline" name="company_landline" placeholder="Enter Landline No." value="<?php echo $row['company_landline']; ?>">
                    </div>
                  <div class="form-group" >
                      <label><span class="glyphicon glyphicon-globe"></span> Website</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_website" name="company_website" placeholder="Enter Website" value="<?php echo $row['company_website']; ?>">
                    </div>
                  <div class="form-group" >
                      <label><span class="glyphicon glyphicon-compressed"></span> Restaurant Type</label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_type" name="company_type" placeholder="Enter Restaurant Type" value="<?php echo $row['company_type']; ?>">
                    </div>
                  
                    <div class="form-group" >
                     <label><span class="glyphicon glyphicon-shopping-cart"></span> Service Type </label>
                        <input type="hidden" id="company_id" name="company_id" value="<?php print $row['company_id']; ?>">
                        <input type="text" class="form-control" id="company_service" name="company_service" placeholder="Enter Service Type" value="<?php echo $row['company_service']; ?>">
                    </div>
                      
                    <div class="form-group">
                      <label for="exampleInputFile"><span class="glyphicon glyphicon-picture"></span> Restaurant Logo</label></br>
                      <img style="display:block; margin-left:auto; margin-right:auto; width: 128px; height: 128px" src="../restaurantlogo/<?php echo $row['company_logo'] ?>" class="img-circle" alt="User Image" /></br>
                    <input style="display:block; margin-left:auto; margin-right:auto" type="file" id="uploadimage" name="uploadimage">
                      <p class="help-block" style=" text-align: center">Image Dimension : 128w x 128h .jpg .png .jepg .gif</p>
                      </span>
                    </div> 
                  
                   
                    <div class="row">
                        
    <!--BANNER_1-->
                     <?php
                            $imgquery1='select * from tbl_companybanner where company_bannerid=1';
                            foreach ($conn->query($imgquery1) as $imgrow1)
                            {
                        ?>   
            <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-image"></i>
                  <h3 class="box-title">Banner Image 1</h3>
                </div><!-- /.box-header -->
            <div class="box-body">
                 <span class="mailbox-attachment-icon has-img">
                     <img src="../restaurantbanner/<?php echo $imgrow1['company_banner']; ?>" alt="Banner-1" />
                      </span>
                      <div class="mailbox-attachment-info">
                          <input type="file" id="uploadbanner1" name="uploadbanner1">
                        <span class="mailbox-attachment-size">
                          Image Dimension : 1400w x 600h
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i> Full View</a>
                        </span>
                      </div>
                 </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col --> 
           <?php } ?>
            
    <!--BANNER_2-->
                <?php
                            $imgquery2='select * from tbl_companybanner where company_bannerid=2';
                            foreach ($conn->query($imgquery2) as $imgrow2)
                            {
                        ?>
            <div class="col-md-4">
             <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-image"></i>
                  <h3 class="box-title">Banner Image 2</h3>
                </div><!-- /.box-header -->
              <div class="box-body">
               <span class="mailbox-attachment-icon has-img">
                  <img src="../restaurantbanner/<?php echo $imgrow2['company_banner']; ?>" alt="Banner-1" />
                     </span>
                      <div class="mailbox-attachment-info">
                          <input type="file" id="uploadbanner2" name="uploadbanner2">
                        <span class="mailbox-attachment-size">
                          Image Dimension : 1400w x 600h
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i> Full View</a>
                        </span>
                      </div>
                   </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
                <?php } ?>
            
               <!--BANNER_3-->
                <?php
                            $imgquery3='select * from tbl_companybanner where company_bannerid=3';
                            foreach ($conn->query($imgquery3) as $imgrow3)
                            {
                        ?>
            <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-image"></i>
                  <h3 class="box-title">Banner Image 3</h3>
                </div><!-- /.box-header -->
               <div class="box-body">
                   <span class="mailbox-attachment-icon has-img">
                      <img src="../restaurantbanner/<?php echo $imgrow3['company_banner']; ?>" alt="Banner-1" />
                    </span>
                      <div class="mailbox-attachment-info">
                          <input type="file" id="uploadbanner3" name="uploadbanner3">
                        <span class="mailbox-attachment-size">
                          Image Dimension : 1400w x 600h
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-eye"></i> Full View</a>
                        </span>
                      </div>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
                <?php } ?>
           </div><!-- /.row -->
          
                    <?php } ?>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" class="btn btn-warning" onClick="return validateItem();">Update</button>
                      <a href="changepassword.php"  type="submit" class="btn btn-danger" >Cancle</a>
                  </div>
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

