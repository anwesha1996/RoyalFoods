<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Royal Foods | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
   <link href="../font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onLoad="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa  fa-cutlery"></i>
<!--                Royal Foods-->
                         <?php 
                          $query4='select * from  tbl_companydetails';
                          foreach ($conn->query($query4) as $row){
                          ?>
                            <?php echo $row['company_name']; ?>
                          <?php } ?>

<?php
$query5="select * from tbl_customerdetails";
foreach ($conn->query($query5) as $itm){
?>
                <small class="pull-right">Date: <?php echo $itm['orderdate']  ?></small>
<?php } ?>
              </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
             <address>
                 <?php 
                          $query6='select * from  tbl_companydetails';
                          foreach ($conn->query($query6) as $row){
                          ?>
                            
                         
              <strong><?php echo $row['company_name']; ?></strong><br>
              <?php echo $row['company_address']; ?><br>
              
              Phone: <?php echo $row['company_landline']; ?><br>
              Email: <?php echo $row['company_email']; ?>
               <?php } ?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
                <?php 
                          $query7="select * from  tbl_customerdetails where customerid=".$_GET['custid']."";
                          foreach ($conn->query($query7) as $row){
                          ?>
              <strong><?php echo $row['name']; ?></strong><br>
              <?php echo $row['address']; ?><br>
              
              Phone: (+91) <?php echo $row['mobileno']; ?><br>
              Email: <?php echo $row['emailid']; ?>
                          <?php } ?>
            </address>
          </div><!-- /.col -->
<!--          <div class="col-sm-4 invoice-col">
            <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
          </div> /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                      <th>Serial #</th>
                      <th>Item</th>
                        <th>Quantity</th>
                    
                    
<!--                    <th>Description</th>-->
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $slno=0;
                        $query8="select * from tbl_subitemdetails inner join tbl_orderdetails on tbl_subitemdetails.subitemid=tbl_orderdetails.subitemid where customerid=".$_GET['custid']."";
                        foreach($conn->query($query8) as $itm){
                            $slno=$slno+1;
                        ?>
                  <tr>
                    <td><?php echo $slno; ?></td>
                    <td><?php echo $itm['subitemname']; ?></td>
                    <td><?php echo $itm['quantity']; ?></td>
                    
                    <td><?php echo $itm['price']; ?></td>
                  </tr>
                        <?php } ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
<!--            <p class="lead">Payment Methods:</p>
            <img src="../dist/img/credit/visa.png" alt="Visa">
            <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../dist/img/credit/american-express.png" alt="American Express">
            <img src="../dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>-->
          </div><!-- /.col -->
          <div class="col-xs-6">
<!--            <p class="lead">Amount Due 2/22/2014</p>-->
<div class="table-responsive">
                   <?php
                    
                        $query9="select distinct totalprice from tbl_orderdetails  where customerid=".$_GET['custid']."";
                        foreach($conn->query($query9) as $itm){
                            
                        ?>
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $itm['totalprice'] ?></td>
                  </tr>
<!--                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>-->
                  <tr>
                    <th>Shipping:</th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $itm['totalprice'] + 10 ; ?></td>
                  </tr>
                </table>
                        <?php } ?>
              </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
  </body>
</html>
