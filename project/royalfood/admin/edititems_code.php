<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
    
    try{
        $q='select count(itemname) as itemname from tbl_itemdetails where itemname="'.$_POST['itemname'].'" and itemid <> "'.$_POST['itemid'].'"';
        foreach ($conn->query($q) as $i){
            $e=$i['itemname'];
        }
        
        if($e==0){
            $query1='update tbl_itemdetails set itemname=?, itemtype=? where itemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query1);
                $data=array(
                    $_POST['itemname'],
                    $_POST['itemtype'],
                    $_POST['itemid']
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
        else{
            $_SESSION['warningmessage'] = 'Item Name Already Exists';
            session_write_close();
            header('Location:admin_additems.php');
            exit;
        }
    } catch (Exception $ex) {
        $_SESSION['warningmessage'] = $ex.getMessage();
        session_write_close();
        header('Location:admin_additems.php');
        exit;
    }
