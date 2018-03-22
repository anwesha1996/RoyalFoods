<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try {
    $query1="select count(subitemname) as subitemname from tbl_subitemdetails where subitemname = '".$_POST['subitemname']."'";
    foreach ($conn->query($query1) as $cnt){
        $count=$cnt['subitemname'];
    }
    if($count==0){
        $conn->beginTransaction();
    $query='insert into tbl_subitemdetails (subitemid,subitemname,itemprice,subitemimage,subitemstatus,itemid) values (?,?,?,?,?,?)';
    $res=$conn->prepare($query);
    if(isset($_FILES['uploadimage']['name']) and !empty($_FILES['uploadimage']['name'])){
                    $nameArray = explode('.', $_FILES['uploadimage']['name']);
                    $newname = md5(microtime() . $_FILES['uploadimage']['name']) . '.' . end($nameArray);
                    $fileSuccess = move_uploaded_file($_FILES['uploadimage']['tmp_name'],'../subitemimage/'.$newname);
                }
    
    $data=array('',
                $_POST['subitemname'],
                $_POST['itemprice'],
                $newname,
                'Active',
                $_POST['itemname']
            );
   
    
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


