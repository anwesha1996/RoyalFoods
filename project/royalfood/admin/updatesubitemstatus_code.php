<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
    
    try{
        $q="select subitemstatus from tbl_subitemdetails where subitemid='".$_GET['subitemid']."'";
        foreach ($conn->query($q) as $row){
            $status=$row['subitemstatus'];
        }
           
            if($status=='Active'){
                //$status=$_GET['stsact'];
                $query1='update tbl_subitemdetails set subitemstatus=? where subitemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query1);
                $data=array(
                    'InActive',
                    $_GET['subitemid']
                );
                $success=$res->execute($data);
                if($success){
                    $conn->commit();
                    $_SESSION['successmessage']='Record updated successfully';
                    session_write_close();
                    header('Location:admin_addsubitems.php');
                    exit;
                }
                else{
                    $conn->rollback();
                    $_SESSION['warningmessage']='Failed to update record';
                    session_write_close();
                    header('Location:admin_addsubitems.php');
                    exit;
                }
            }
            elseif ($status=='InActive') {
                //$status=$_GET['stsinact'];
                $query1='update tbl_subitemdetails set subitemstatus=? where subitemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query1);
                $data=array(
                    'Active',
                    $_GET['subitemid']
                );
                $success=$res->execute($data);
                if($success){
                    $conn->commit();
                    $_SESSION['successmessage']='Record updated successfully';
                    session_write_close();
                    header('Location:admin_addsubitems.php');
                    exit;
                }
                else{
                    $conn->rollback();
                    $_SESSION['warningmessage']='Failed to update record';
                    session_write_close();
                    header('Location:admin_addsubitems.php');
                    exit;
                }
            }
            
           
        
    } catch (Exception $ex) {
        $_SESSION['warningmessage'] = $ex.getMessage();
        session_write_close();
        header('Location:admin_addsubitems.php');
        exit;
    }


