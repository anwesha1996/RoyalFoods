<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try{
    $conn->beginTransaction();
    $query="delete from tbl_itemdetails where itemid=?";
    $res=$conn->prepare($query);
    $data=array($_GET['itemid']);
    $success=$res->execute($data);
    
    if($success){
        $conn->commit();
        $_SESSION['successmessage']='Item details delete successfully';
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }else{
        $conn->rollback();
        $_SESSION['successmessage']='Failed to delete Item details';
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessage']='Error:'.$ex->getMessage();
    session_write_close();
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit;
}



