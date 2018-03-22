<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try{
    
    $query="select userid from  tbl_adminlogindetails where username='" . $_POST['formusername'] . "' and password='" . $_POST['formpassword'] . "'";
   
    foreach ($conn->query($query) as $row){
        $memberid=$row['userid'];
         
    }
   
   if($memberid > 0){
       $_SESSION['userid']=$memberid;
       header('Location:admin/admin_dashboard.php');
   }
   else{
       $_SESSION['message']='Incorrect EmailId or Password';
       session_write_close();
       header('Location:'.$_SERVER['HTTP_REFERER']);
       exit;
   }
} catch (Exception $ex) {
    die('Could not connect '.$ex->getMessage());
}
