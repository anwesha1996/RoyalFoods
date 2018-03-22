<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                
                <?php 
                          $query='select * from  tbl_companydetails';
                          foreach ($conn->query($query) as $row){
                          ?>
                  
                  
                  
                <a href="admin_dashboard.php" class="navbar-brand"><b><?php echo $row['company_name']; ?></b>&nbsp;<i class="fa  fa-cutlery"></i></a>
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
                      <span class="label label-danger">
                          <?php
                          $count=0;
                            $cntquery="select count(*) as count from tbl_customerdetails where customerstatus='New'";
                            foreach ($conn->query($cntquery) as $cntrow){
                                $count=$cntrow['count'];
                            }
                          ?>
                          <?php echo $count;?>
                      </span></a>
                    
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