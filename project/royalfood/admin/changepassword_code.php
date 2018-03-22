<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

//if(isset($_SESSION['memberid'])){
//var_dump($_SESSION['memberid']);
//exit;
//}
try{
    $query1='select Password from tbl_adminlogindetails where userid="'.$_SESSION['userid'].'"';
    foreach ($conn->query($query1) as $row){
        $oldpassword=$row['Password'];
    }

    if($oldpassword==$_POST['oldpassword']){
        $conn->beginTransaction();
        $query2='update tbl_adminlogindetails set Password=? where userid=?';
        $res=$conn->prepare($query2);
        $data=  [$_POST['newpassword'],$_SESSION['userid']];
        $success=$res->execute($data);
        if($success){
            $conn->commit();
            $_SESSION['successmessage'] = "Your password has been changed successfully";
            session_write_close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit;
        }
        else{
            $conn->rollback();
            $_SESSION['warningmessage'] = "Failed to change password.Try again.";
            session_write_close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    else{
        $_SESSION['warningmessage'] = "The old password you have entered is incorect";
        session_write_close();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
} catch (Exception $ex) {
    $_SESSION['errormessage']=  $ex->getMessage();
    session_write_close();
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit;
}


