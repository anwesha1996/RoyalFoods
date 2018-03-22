<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Online Food Ordering System | Add Sub Items</title>
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
            SUB FOOD ITEMS
            <small>Easily Managed Sub Items</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sub Food Items</li>
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
                  <h3 class="box-title">Add Sub-Items Details</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                  </div>
                  </div>
                 
                  <form role="form" name="frmitem" method="post" id="frmitem" action="admin_addsubitemscode.php"  enctype="multipart/form-data">
                        
                        
                  <div class="box-body">
                  <div class="form-group" >
                    
                    <select class="form-control select2" name="itemname" id="itemname">
                        <option value="">Select Item</option>
                      <?php
                            // where did you define dboperations class ??????
                            // the change event of the dropdown can be added with ajax functionality to get data from DB and populate in text box
                            // I am not doing this as you have not designed it properly ---------- SORRY
                            //<?php echo ($itm['Stateid'] == $itm['Stateid'] ? ' selected="selected"' : ''); // i did this before in option
                            $ires = 'select itemid,itemname from tbl_itemdetails';
                            foreach ($conn->query($ires) as $itm) {
                                ?>
                                
                                <option value="<?php print $itm['itemid']; ?>"><?php echo $itm['itemname']; ?></option>
                            <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                    <div class="form-group" >
                      
                      <input type="text" class="form-control" id="subitemname" name="subitemname" placeholder="Enter Items Name">
                    </div>
                    <div class="form-group" >
                     
                        <input type="text" class="form-control" id="itemprice" name="itemprice" placeholder="Enter Price" onKeyPress="return validate(event);">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Image Upload</label>
                      <input type="file" id="uploadimage" name="uploadimage">
                      <p class="help-block">image size (50X50) .jpg or .png</p>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" class="btn btn-warning" onClick="return validateItem();">Submit</button>
                  </div>
                </form>
                      
                  
                
                </div>
                <div class="box box-warning box-solid">
                    <form name="frmdelete" id="frmdelete" method="post" action="deletemultiplesubitem_code.php">
                <div class="box-header with-border">
                  <h3 class="box-title">Sub Items Details</h3>
                </div>
                <div class="box-body">
                
                  <div class="table-responsive" style="height:400px">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                            <th style="width:18px">Select</th>
                          <th style="width:18px">SL</th>
                          <th style="width:200px">Item Name</th>
                          <th style="width:200px">Sub Item</th>
                          <th style="width:100px">Image</th>
                          <th>Type</th>
                          <th>Price</th>
                          <th>Active</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      
                      <?php $i = 0; ?>
                          <?php 
                          $query='SELECT tbl_itemdetails.itemname,tbl_itemdetails.itemtype, tbl_subitemdetails.subitemname,tbl_subitemdetails.itemprice, tbl_subitemdetails.subitemimage,tbl_subitemdetails.subitemstatus,tbl_subitemdetails.itemid,tbl_subitemdetails.subitemid FROM tbl_subitemdetails INNER JOIN tbl_itemdetails ON tbl_subitemdetails.itemid = tbl_itemdetails.itemid';
                          foreach ($conn->query($query) as $row){
                          ?>
                        <tr>
                        <td>
                            <label>
                                <input type="checkbox" name="chkUser[]" id="chkUser" value="<?php echo $row['subitemid']; ?>">
                            </label>
                        </td>
                      
                        <td>
                            <?php echo ++$i; ?>
                        </td>
                        <td><i class="fa fa-support"></i><i class="fa fa-spoon "></i>&nbsp;
                            
                            <?php echo $row['itemname'] ?>
                        </td>
                        
                        <td><i class="fa  fa-cutlery"> </i>&nbsp;
                            <?php echo $row['subitemname'] ?>
                        </td>
                        
                        <td>
                            <div class="product-img">
                              <img src="../subitemimage/<?php echo $row['subitemimage'] ?>" height="50px" width="50px"  alt="Product Image" />
                            </div>

                        </td>
                        
                          <?php 
                              $itmtype= $row['itemtype'];
                              if($itmtype=='Veg'){
                          ?>
                          <td>
                              <i class="fa fa-circle text-success"></i>
                          </td>
                              
                          
                          <?php } else if($itmtype=='Non-Veg'){ ?>
                           <td>
                              <i class="fa fa-circle text-danger"></i>
                           </td>
                          
                           <?php } else if($itmtype=='Drinks'){ ?>
                           <td>
                              <i class="fa fa-circle text-info"></i>
                           </td>
                           <?php } ?>
                          
                          
                            <td><i class="fa fa-rupee"><?php echo $row['itemprice'] ?>/-</td>
                            

                            
                            <?php 
                            $itemstatus= $row['subitemstatus'];
                            if($itemstatus=='Active'){
                          ?>
                          <td>
                              <a style="color: green" href="updatesubitemstatus_code.php?subitemid=<?php echo $row['subitemid'] ?>">
                                  
                                  <?php echo $row['subitemstatus']; ?>
                              </a>
                              
                          </td>
                          <?php } else { ?>
                          <td>
                              <a style="color: red" href="updatesubitemstatus_code.php?subitemid=<?php echo $row['subitemid'] ?>">
                              
                              <?php echo $row['subitemstatus']; ?>
                              </a>
                          </td>
                          <?php } ?>
                            
                          
                            <td><a href="editsubitem_design.php?subitemid=<?php echo $row['subitemid'] ?>" class="label label-warning"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</a></td>
                          <td> <a onClick="return confirm('Are you sure you want to delete this item ?');" href="deletesubitem_code.php?subitemid=<?php echo $row['subitemid'] ?>" class="label label-danger"><i class="fa fa-trash"></i>&nbsp;Remove</a></td>
                          
                        </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                
                
             
                
                
                <div class="box-footer clearfix">
<!--                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Remove Select Items</a>-->
<input type="submit" value="Remove Select Items" id="delete" name="delete" class="btn btn-sm btn-danger btn-flat pull-left" onClick="setDeleteAction();">
<!--                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>-->
                </div>
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
