<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';

try {
    
    $conn->beginTransaction();
    $query='insert into tbl_customerdetails (name,emailid,address,mobileno,area,landmark,customerstatus,orderdate,ordertime,delhiverydate,delhiverytime,city) '
            . 'values (?,?,?,?,?,?,?,?,?,?,?,?)';
    $res=$conn->prepare($query);
    
    $my_date = date("Y-m-d");
    //$time=date("h:i:s A", strtotime("now"));;
   
    
    
    date_default_timezone_set('Asia/Calcutta');
    $time=date("h.i A");
    
    $cal_date=$_POST['deliverydate'];
    $date=date('Y-m-d',strtotime($cal_date));
    
    
    $data=array(
        $_POST['name'],
        $_POST['emailid'],
        $_POST['address'],
        
        $_POST['mobileno'],
        $_POST['area'],
        $_POST['landmark'],
        
       'New',
        //now(),
        //time(),
        $my_date,
        $time,
    
        $date,
        $_POST['deliverytime'],
        $_POST['city']);
    
    
    
    $success=$res->execute($data);
   
   
    if($success){
//        
        
        $customerid=$conn->lastInsertId();
        
       
        
        
         foreach($_SESSION['cart_products1'] as $row=>$id)
        {
            
            $subitemid=$_SESSION['cart_products1'][$row]['subitemid'];
            
            $quantity=$_SESSION['cart_products1'][$row]['quantity'];
            $price=$_SESSION['cart_products1'][$row]['itemprice'];
            $totalprice=$_POST['totalprice'];
            
            
            $newquery="insert into tbl_orderdetails (customerid,subitemid,quantity,price,totalprice) values (?,?,?,?,?)";
            $res1=$conn->prepare($newquery);
            
            $data1=array($customerid,$subitemid,$quantity,$price,$totalprice);
            
            
            $success1=$res1->execute($data1);
            
            
            
        }
        
       if($success1){
           $conn->commit();
//           var_dump('success');
//           exit;
            $_SESSION['successmessage']="success.";
            session_write_close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit;
       }
       else{
           $conn->rollback();
//           var_dump('warning');
//           exit;
           $_SESSION['warningmessage']="warning.";
            session_write_close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit;
       }
        
    }
    else{
       //$conn->rollback();
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


