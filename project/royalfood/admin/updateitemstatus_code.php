<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
    
    try{
        $q="select itemstatus from tbl_itemdetails where itemid='".$_GET['itemid']."'";
        foreach ($conn->query($q) as $row){
            $status=$row['itemstatus'];
        }
           
            if($status=='Active'){
                //$status=$_GET['stsact'];
                $query1='update tbl_itemdetails set itemstatus=? where itemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query1);
                $data=array(
                    'InActive',
                    $_GET['itemid']
                );
                $success=$res->execute($data);
                if($success){
                    $conn->commit();
                    $_SESSION['successmessage']='Record updated successfully';
                    session_write_close();
                    header('Location:admin_additems.php');
                    exit;
                }
                else{
                    $conn->rollback();
                    $_SESSION['warningmessage']='Failed to update record';
                    session_write_close();
                    header('Location:admin_additems.php');
                    exit;
                }
            }
            elseif ($status=='InActive') {
                //$status=$_GET['stsinact'];
                $query1='update tbl_itemdetails set itemstatus=? where itemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query1);
                $data=array(
                    'Active',
                    $_GET['itemid']
                );
                $success=$res->execute($data);
                if($success){
                    $conn->commit();
                    $_SESSION['successmessage']='Record updated successfully';
                    session_write_close();
                    header('Location:admin_additems.php');
                    exit;
                }
                else{
                    $conn->rollback();
                    $_SESSION['warningmessage']='Failed to update record';
                    session_write_close();
                    header('Location:admin_additems.php');
                    exit;
                }
            }
            
           
        
    } catch (Exception $ex) {
        $_SESSION['warningmessage'] = $ex.getMessage();
        session_write_close();
        header('Location:admin_additems.php');
        exit;
    }

