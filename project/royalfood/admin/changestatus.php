<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
try{
    $conn->beginTransaction();
    $query="update tbl_customerdetails set customerstatus=? where customerid=?";
    $res=$conn->prepare($query);
    $data=array('Delivered',$_GET['customerid']);
    $success=$res->execute($data);
    
    if($success){
        $conn->commit();
        $_SESSION['successmessage']="Status changed successfully.";
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }else{
        $conn->rollback();
        $_SESSION['warningmessage']="Failed to change status. Please try again.";
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
} catch (Exception $ex) {
        $_SESSION['errormessage']=$ex->getMessage();
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
}
