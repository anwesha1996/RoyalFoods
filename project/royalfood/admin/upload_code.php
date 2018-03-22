<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try {
    $query="select userimage from tbl_adminlogindetails where userid='".$_SESSION['userid']."'";
    foreach ($conn->query($query) as $itm){
        $imgname=$itm['userimage'];
    }
    $conn->beginTransaction();
    $query1='update tbl_adminlogindetails set userimage=? where userid=?';
    $res=$conn->prepare($query1);
    if(isset($_FILES['uploadimage']['name']) and !empty($_FILES['uploadimage']['name'])){
                    $nameArray = explode('.', $_FILES['uploadimage']['name']);
                    $newname = md5(microtime() . $_FILES['uploadimage']['name']) . '.' . end($nameArray);
                    $fileSuccess = move_uploaded_file($_FILES['uploadimage']['tmp_name'],'../userimage/'.$newname);
                }
    
    $data=array(
                $newname,
                $_SESSION['userid']
               );
   
    
    $success=$res->execute($data);
    
 
   
    if($success){
        if(file_exists('../userimage/'.$imgname)){
                        unlink('../userimage/'.$imgname);
                    }
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
    
    
    
} catch (Exception $ex) {
        $_SESSION['errormessage']=$ex->getMessage();
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
}


