<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try {
        var_dump($_POST['uploadimage']);
        exit;
        $conn->beginTransaction();
        $query='update tbl_adminlogindetails set userimage=? where userid=?';
        $res=$conn->prepare($query);
        
        if(isset($_FILES['uploadimage']['name']) and !empty($_FILES['uploadimage']['name'])){
                    $nameArray = explode('.', $_FILES['uploadimage']['name']);
                    $newname = md5(microtime() . $_FILES['uploadimage']['name']) . '.' . end($nameArray);
                    $fileSuccess = move_uploaded_file($_FILES['uploadimage']['tmp_name'],__DIR__ . DIRECTORY_SEPARATOR .'userimage/'.$newname);
                }
    
    $data=array(
                $newname,
                $_SESSION['userid']
            );
    
    
    $success=$res->execute($data);
    
  
   
    if($success){
        $conn->commit();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
    else{
        $conn->rollback();
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }
} catch (Exception $ex) {
       die($ex->getMessage());
}



