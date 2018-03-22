<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
    
    try{
        $q="select count(subitemname) as subitemname from tbl_subitemdetails where subitemname='".$_POST['subitemname']."' and subitemid <> '".$_POST['subitemid']."'";
        foreach ($conn->query($q) as $i){
            $e=$i['subitemname'];
        }
       
        if($e==0){
            if(empty($_FILES['uploadimage']['name'])){
                $query1='update tbl_subitemdetails set subitemname=?, itemprice=?, itemid=? where subitemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query1);
                $data=array(
                    $_POST['subitemname'],
                    $_POST['itemprice'],
                    $_POST['itemname'],
                    $_POST['subitemid']
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
           
            else {
                $query4='update tbl_subitemdetails set subitemname=?, itemprice=?, itemid=? ,subitemimage =? where subitemid=?';
                $conn->beginTransaction();
                $res=$conn->prepare($query4);
                
                if(isset($_FILES['uploadimage']['name']) and !empty($_FILES['uploadimage']['name'])){
                    $nameArray = explode('.', $_FILES['uploadimage']['name']);
                    $newname = md5(microtime() . $_FILES['uploadimage']['name']) . '.' . end($nameArray);
                    $fileSuccess = move_uploaded_file($_FILES['uploadimage']['tmp_name'],'../subitemimage/'.$newname);
                }
                

                $data=array(
                    $_POST['subitemname'],
                    $_POST['itemprice'],
                    $_POST['itemname'],
                    $newname,
                    $_POST['subitemid']
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
        }
        else{
            $_SESSION['warningmessage'] = 'SubItem Name Already Exists';
            session_write_close();
            header('Location:admin_addsubitems.php');
            exit;
        }
    } catch (Exception $ex) {
        $_SESSION['errormessage'] = $ex->getMessage();
            session_write_close();
            header('Location:admin_addsubitems.php');
            exit;
    }

