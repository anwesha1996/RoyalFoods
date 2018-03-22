<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try{
   
    $conn->beginTransaction();
    $rowCount = count($_POST["chkUser"]);
    
    for($i=0;$i<$rowCount;$i++) {
        $query = "delete from tbl_subitemdetails  where subitemid = ? ";
        $res=$conn->prepare($query);
       
        $data=array($_POST["chkUser"][$i]);
        $success=$res->execute($data);
    }

    if($success==true){
        $conn->commit();
        $_SESSION['successmessage']='Item details delete successfully';
        session_write_close();
        header('Location:admin_addsubitems.php');
        exit;
    }
    else if($success==false){
        $conn->rollback();
        $_SESSION['warningmessage']='Failed to delete Item details';
        session_write_close();
        header('Location:admin_addsubitems.php');
        exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessage']='Error:'.$ex->getMessage();
    session_write_close();
    header('Location:admin_addsubitems.php');
    exit;
}



