<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try {
    $query1="select count(itemname) as itemname from tbl_itemdetails where itemname = '".$_POST['itemname']."'";
    foreach ($conn->query($query1) as $cnt){
        $count=$cnt['itemname'];
    }
    if($count==0){
        $conn->beginTransaction();
    $query='insert into tbl_itemdetails (itemid,itemname,itemtype,itemstatus) values (?,?,?,?)';
    $res=$conn->prepare($query);
    
    $data=array('',$_POST['itemname'],$_POST['itemtype'],'Active');
    
    
    $success=$res->execute($data);
   
    if($success){
        $conn->commit();
        $_SESSION['successmessage']="Record inserted successfully.";
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
    else{
        $conn->rollback();
        $_SESSION['warningmessage']="Failed to insert the record.";
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
    }else{
       $_SESSION['warningmessage']="Item already exists.";
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


